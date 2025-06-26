<?php

namespace App\Http\Controllers;

use App\Models\SCambiorol;
use App\Models\SContenidoproyec;
use App\Models\SDonacione;
use App\Models\SInformeprac;
use App\Models\Solicitud;
use App\Models\SOrganevento;
use App\Models\SPostulacion;
use App\Models\SReportemensual;
use App\Models\SReunion;
use App\Models\TipoSolicitud;
use App\Models\User;
use App\Models\Disponibilidad;
use App\Models\DetalleDisponibilidad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Services\GoogleCalendarService;

class SolicitudController extends Controller
{
    public function create()
    {
        $user = authUser();
        $tipos = match ($user->rol_id) {
            1 => TipoSolicitud::whereIn('tipo', ['Reunión'])->get(),
            2 => TipoSolicitud::whereIn('tipo', ['Reunión', 'Subir/Actualizar Contenido de Proyecto'])->get(),
            3 => TipoSolicitud::whereIn('tipo', ['Organizar Evento'])->get(),
            4 => TipoSolicitud::whereIn('tipo', ['Informe Práctica'])->get(),
            5 => TipoSolicitud::whereIn('tipo', ['Validación de Reporte'])->get(),
            6, 7 => TipoSolicitud::whereIn('tipo', ['Cambiar Rol'])->get(),
            8 => TipoSolicitud::all(),
            default => collect(),
        };

        return view('viewsprivate.solicitud.create', compact('tipos'));
    }

    public function store(Request $request, GoogleCalendarService $calendarService)
    {
        DB::beginTransaction();
        try {
            $solicitud = Solicitud::create([
                'tipo_id' => $request->tipo_id,
                'estado' => 'pendiente',
                'fecha' => now(),
                'user_id' => Auth::id()
            ]);

            $tipo = TipoSolicitud::find($request->tipo_id)->tipo;

            if ($tipo === 'Reunión') {
                $request->validate([
                    'fecha_reunion' => 'required|date',
                    'hora_reunion' => 'required|date_format:H:i',
                    'duracion_minutos' => 'required|integer|min:15',
                    'destinatario_id' => 'required|exists:users,id',
                    'motivo' => 'required|string|max:255',
                ]);

                $fechaHoraInicio = Carbon::parse($request->input('fecha_reunion') . ' ' . $request->input('hora_reunion'));
                $fechaHoraFin = $fechaHoraInicio->copy()->addMinutes($request->input('duracion_minutos'));

                // Guardar en BD
                SReunion::create([
                    'solicitud_id'      => $solicitud->id,
                    'destinatario_id'   => $request->input('destinatario_id'),
                    'motivo'            => $request->input('motivo'),
                    'calendario'        => $request->input('calendario'),
                    'prioridad'         => $request->input('prioridad'),
                    'fecha_hora_inicio' => $fechaHoraInicio,
                    'duracion_minutos'  => $request->input('duracion_minutos'),
                ]);

                // Obtener destinatario
                $destinatario = User::find($request->input('destinatario_id'));

                // Crear evento en Google Calendar
                $calendarService->crearEvento([
                    'titulo'      => 'Reunión: ' . $request->input('motivo'),
                    'descripcion' => 'Reunión entre ' . auth()->user()->name . ' y ' . $destinatario->name,
                    'inicio'      => $fechaHoraInicio->toAtomString(),
                    'fin'         => $fechaHoraFin->toAtomString(),
                    'asistentes'  => [
                        ['email' => auth()->user()->email],
                        ['email' => $destinatario->email],
                    ],
                ]);
            }

            DB::commit();
            return redirect()->route('dashboard')->with('success', 'Solicitud registrada correctamente.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors([
                'error' => 'Error al registrar solicitud: ' . $e->getMessage()
            ])->withInput();
        }
    }

    public function usuariosPorRol($rol_id)
    {
        $usuarios = User::where('rol_id', $rol_id)->get(['id', 'name', 'email']);
        return response()->json($usuarios);
    }

    public function obtenerFechasDisponibles($usuario_id)
    {
        $rangos = Disponibilidad::where('user_id', $usuario_id)->get(['fecha_inicio', 'fecha_fin']);

        $fechasDisponibles = [];

        foreach ($rangos as $rango) {
            $inicio = Carbon::parse($rango->fecha_inicio);
            $fin = Carbon::parse($rango->fecha_fin);

            while ($inicio <= $fin) {
                $fechasDisponibles[] = $inicio->format('Y-m-d');
                $inicio->addDay();
            }
        }

        return response()->json($fechasDisponibles);
    }

    public function obtenerHorasDisponibles(Request $request)
    {
        $usuario_id = $request->input('usuario_id');
        $fecha = $request->input('fecha');

        setlocale(LC_TIME, 'es_ES.UTF-8');
        $diaSemana = Carbon::parse($fecha)->locale('es')->isoFormat('dddd');
        $diaSemana = ucfirst($diaSemana);

        $disponibilidad = Disponibilidad::where('user_id', $usuario_id)
            ->where('fecha_inicio', '<=', $fecha)
            ->where('fecha_fin', '>=', $fecha)
            ->first();

        if (!$disponibilidad) {
            return response()->json([]);
        }

        $detalle = DetalleDisponibilidad::where('dispon_id', $disponibilidad->dispon_id)
            ->where('dia', $diaSemana)
            ->first();

        if (!$detalle) {
            return response()->json([]);
        }

        $horaInicio = Carbon::parse($detalle->hora_inicio);
        $horaFin = Carbon::parse($detalle->hora_fin);

        $intervalos = [];

        while ($horaInicio < $horaFin) {
            $intervalos[] = $horaInicio->format('H:i');
            $horaInicio->addMinutes(30);
        }

        return response()->json($intervalos);
    }
}
