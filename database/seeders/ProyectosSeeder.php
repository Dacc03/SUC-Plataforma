<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProyectosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('proyectos')->insert([
            [
                'user_id'        => 1,
                'titulo'         => 'Sistema de gestión académica',
                'descripcion'    => 'Plataforma para administrar matrículas y evaluaciones en línea.',
                'fecha_inicio'   => '2025-05-01',
                'fecha_fin'      => '2025-07-15',
                'adjunto'        => 'proyectos/gestion_academica.pdf',
                'nivel_progreso' => '60%',
                'estado'         => 'activo',
                'created_at'     => now(),
                'updated_at'     => now(),
            ],
            [
                'user_id'        => 1,
                'titulo'         => 'App de voluntariado social',
                'descripcion'    => 'Aplicación móvil para coordinar actividades de voluntariado en zonas vulnerables.',
                'fecha_inicio'   => '2025-04-20',
                'fecha_fin'      => '2025-08-10',
                'adjunto'        => 'proyectos/voluntariado_app.pdf',
                'nivel_progreso' => '80%',
                'estado'         => 'activo',
                'created_at'     => now(),
                'updated_at'     => now(),
            ],
            [
                'user_id'        => 2,
                'titulo'         => 'Portal de empleo para jóvenes',
                'descripcion'    => 'Sitio web con ofertas laborales y orientación vocacional para recién egresados.',
                'fecha_inicio'   => '2025-03-01',
                'fecha_fin'      => '2025-06-30',
                'adjunto'        => 'proyectos/portal_empleo.pdf',
                'nivel_progreso' => '90%',
                'estado'         => 'activo',
                'created_at'     => now(),
                'updated_at'     => now(),
            ],
            [
                'user_id'        => 2,
                'titulo'         => 'Repositorio de investigaciones locales',
                'descripcion'    => 'Base de datos para centralizar investigaciones sociales y comunitarias.',
                'fecha_inicio'   => '2025-05-10',
                'fecha_fin'      => '2025-09-01',
                'adjunto'        => 'proyectos/repositorio_local.pdf',
                'nivel_progreso' => '45%',
                'estado'         => 'activo',
                'created_at'     => now(),
                'updated_at'     => now(),
            ],
            [
                'user_id'        => 3,
                'titulo'         => 'Sistema de alertas ciudadanas',
                'descripcion'    => 'Plataforma para reportar emergencias en tiempo real.',
                'fecha_inicio'   => '2025-06-01',
                'fecha_fin'      => '2025-09-30',
                'adjunto'        => 'proyectos/alertas_ciudadanas.pdf',
                'nivel_progreso' => '25%',
                'estado'         => 'activo',
                'created_at'     => now(),
                'updated_at'     => now(),
            ],
            [
                'user_id'        => 3,
                'titulo'         => 'Mapa interactivo de servicios sociales',
                'descripcion'    => 'WebGIS que muestra comedores, centros médicos y ONGs disponibles por distrito.',
                'fecha_inicio'   => '2025-04-15',
                'fecha_fin'      => '2025-07-31',
                'adjunto'        => 'proyectos/mapa_servicios.pdf',
                'nivel_progreso' => '70%',
                'estado'         => 'activo',
                'created_at'     => now(),
                'updated_at'     => now(),
            ],
        ]);
    }
}
