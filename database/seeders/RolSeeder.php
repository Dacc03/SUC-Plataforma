<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Rol;

class RolSeeder extends Seeder
{
    public function run(): void
    {
        Rol::insert([
            ['nombre' => 'Usuario estándar'],
            ['nombre' => 'Usuario aliado'],
            ['nombre' => 'Practicante'],
            ['nombre' => 'Voluntario'],
            ['nombre' => 'Colaborador'],
            ['nombre' => 'Director'],
            ['nombre' => 'Director general'],
        ]);
    }
}
