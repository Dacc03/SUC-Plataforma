<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DisponibilidadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Inserta la disponibilidad
        DB::table('disponibilidad')->insert([
            'user_id' => 5,
            'fecha_inicio' => '2025-07-01',
            'fecha_fin' => '2025-07-07',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        // Inserta los detalles asociados a la disponibilidad con ID 1
        DB::table('detalle_disponibilidad')->insert([
            [
                'dispon_id' => 1,
                'dia' => 'Lunes',
                'hora_inicio' => '09:00:00',
                'hora_fin' => '13:00:00',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'dispon_id' => 1,
                'dia' => 'Miércoles',
                'hora_inicio' => '10:00:00',
                'hora_fin' => '14:00:00',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);

        // Inserta los tipos de solicitud
        DB::table('tipo_solicitud')->insert([
            ['tipo' => 'Reunión', 'definicion' => 'Solicitud para agendar una reunión con fines institucionales o de coordinación.'],
            ['tipo' => 'Postulación', 'definicion' => 'Solicitud para postular a un cargo, beneficio o participación en un proceso.'],
            ['tipo' => 'Donación Especial', 'definicion' => 'Solicitud relacionada con la entrega o recepción de donaciones fuera de lo habitual.'],
            ['tipo' => 'Organizar Evento', 'definicion' => 'Solicitud para planificar, coordinar y ejecutar un evento institucional o académico.'],
            ['tipo' => 'Informe Práctica', 'definicion' => 'Solicitud para presentar o validar el informe correspondiente a una práctica profesional o académica.'],
            ['tipo' => 'Validación de Reporte', 'definicion' => 'Solicitud para revisar y aprobar un reporte generado previamente.'],
            ['tipo' => 'Cambiar Rol', 'definicion' => 'Solicitud para modificar el rol o perfil asignado a un usuario en el sistema.'],
            ['tipo' => 'Subir/Actualizar Contenido de Proyecto', 'definicion' => 'Solicitud para registrar o modificar información en proyectos existentes.'],
            ['tipo' => 'Aliado de fundación', 'definicion' => 'Persona o entidad que colabora de forma constante con la fundación en actividades, recursos o difusión de sus objetivos.'],
        ]);
    }
}
