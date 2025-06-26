<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Disponibilidad;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class DisponibilidadController extends Controller
{
    // Obtener fechas disponibles para un usuario
    public function obtenerFechasDisponibles($userId)
    {
        try {
            $registros = DB::table('detalle_disponibilidad')
                ->where('user_id', $userId)
                ->get(['fecha', 'hora_inicio', 'hora_fin']);

            $fechas = $registros->pluck('fecha')->unique()->values();

            return response()->json($fechas);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Error al obtener las fechas disponibles: ' . $e->getMessage()
            ], 500);
        }
    }

    // Obtener horas disponibles para una fecha específica
    public function obtenerHorasDisponibles(Request $request)
    {
        $request->validate([
            'usuario_id' => 'required|integer',
            'fecha' => 'required|date'
        ]);

        try {
            $usuarioId = $request->input('usuario_id');
            $fecha = $request->input('fecha');

            $registro = DB::table('detalle_disponibilidad')
                ->where('user_id', $usuarioId)
                ->where('fecha', $fecha)
                ->first();

            if (!$registro) {
                return response()->json([]);
            }

            $horaInicio = Carbon::parse($registro->hora_inicio);
            $horaFin = Carbon::parse($registro->hora_fin);

            $intervalos = [];

            while ($horaInicio < $horaFin) {
                $intervalos[] = $horaInicio->format('H:i');
                $horaInicio->addMinutes(30);
            }

            return response()->json($intervalos);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Error al obtener horas disponibles: ' . $e->getMessage()
            ], 500);
        }
    }
}
