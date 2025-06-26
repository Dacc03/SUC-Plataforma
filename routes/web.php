<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProyectoController;
use App\Http\Controllers\EventoController;
use App\Http\Controllers\SolicitudController;
use App\Models\TipoSolicitud;
use App\Models\User;
use App\Http\Controllers\GoogleCalendarAuthController;
use App\Http\Controllers\DisponibilidadController;

Route::get('/', function () {
    return view('index');
});

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');




Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/viewsprivate/solicitud', [SolicitudController::class, 'create'])->name('solicitud.create');
    Route::post('/viewsprivate/solicitud', [SolicitudController::class, 'store'])->name('solicitud.store');

    Route::get('/disponibilidad-fechas/{userId}', [DisponibilidadController::class, 'obtenerFechasDisponibles']);
    Route::post('/horas-disponibles', [DisponibilidadController::class, 'obtenerHorasDisponibles']);
    Route::get('/usuarios-por-rol/{rol_id}', [SolicitudController::class, 'usuariosPorRol']);
    Route::get('/formularios-solicitud/{id}', function ($id) {

        $tipo = TipoSolicitud::findOrFail($id);
        $vista = match ($tipo->tipo) {
            'Reunión' => 'reunion',
            'Postulación' => 'postulacion',
            'Donación Especial' => 'donacione',
            'Organizar Evento' => 'organevento',
            'Informe Práctica' => 'informeprac',
            'Validación de Reporte' => 'reportemensual',
            'Cambiar Rol' => 'cambiorol',
            'Subir/Actualizar Contenido de Proyecto' => 'contenidoproyec',
        };

        if ($tipo->tipo === 'Reunión') {
            $destinatarios = User::whereIn('rol_id', [5, 6, 7])->get();
            return view("viewsprivate.solicitud.partials.$vista", compact('tipo', 'destinatarios'))->render();
        }

        return view("viewsprivate.solicitud.partials.$vista", compact('tipo'))->render();
    });
});



//Rutas publicas
Route::get('/views_public/proyectos', [ProyectoController::class, 'index'])->name('proyectos.index');

Route::get('/views_public/eventos', [EventoController::class, 'index'])->name('eventos.index');
Route::get('/views_public/eventos/{id}', [EventoController::class, 'show'])->name('eventos.show');

Route::get('/auth/google-calendar/redirect', [GoogleCalendarAuthController::class, 'redirect'])->name('google.redirect');
Route::get('/auth/google-calendar/callback', [GoogleCalendarAuthController::class, 'callback'])->name('google.callback');

require __DIR__ . '/auth.php';
