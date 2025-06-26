<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class EventoSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('evento')->insert([
            [
                'titulo' => 'Taller de liderazgo',
                'tipo' => 'taller',
                'descripcion' => 'Taller para desarrollar habilidades de liderazgo.',
                'fecha_inicio' => '2025-07-01',
                'fecha_fin' => '2025-07-01',
                'hora' => '10:00:00',
                'modalidad' => 'Presencial',
                'ubicacion' => 'Auditorio Central',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'titulo' => 'Webinar sobre salud mental',
                'tipo' => 'webinar',
                'descripcion' => 'Sesión online para hablar de salud mental.',
                'fecha_inicio' => '2025-07-03',
                'fecha_fin' => '2025-07-03',
                'hora' => '18:00:00',
                'modalidad' => 'Virtual',
                'ubicacion' => 'Zoom',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'titulo' => 'Campaña de donación',
                'tipo' => 'campaña',
                'descripcion' => 'Campaña para recolectar donaciones para niños.',
                'fecha_inicio' => '2025-07-05',
                'fecha_fin' => '2025-07-10',
                'hora' => '09:00:00',
                'modalidad' => 'Presencial',
                'ubicacion' => 'Parque Central',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'titulo' => 'Conferencia educativa',
                'tipo' => 'conferencia',
                'descripcion' => 'Conferencia sobre innovación educativa.',
                'fecha_inicio' => '2025-07-12',
                'fecha_fin' => '2025-07-12',
                'hora' => '15:00:00',
                'modalidad' => 'Virtual',
                'ubicacion' => 'Google Meet',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'titulo' => 'Jornada ecológica',
                'tipo' => 'actividad',
                'descripcion' => 'Limpieza del río y reciclaje comunitario.',
                'fecha_inicio' => '2025-07-15',
                'fecha_fin' => '2025-07-15',
                'hora' => '08:00:00',
                'modalidad' => 'Presencial',
                'ubicacion' => 'Río Rímac',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'titulo' => 'Charla motivacional',
                'tipo' => 'charla',
                'descripcion' => 'Charla para jóvenes emprendedores.',
                'fecha_inicio' => '2025-07-20',
                'fecha_fin' => '2025-07-20',
                'hora' => '11:00:00',
                'modalidad' => 'Presencial',
                'ubicacion' => 'Sala de Conferencias A',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
