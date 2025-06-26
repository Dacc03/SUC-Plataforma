<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Perfil;
use Illuminate\Support\Facades\Hash;

class UsuarioSeeder extends Seeder
{
    public function run(): void
    {
        $roles = [
            1 => 'Usuario Estándar',
            2 => 'Usuario Aliado',
            3 => 'Practicante',
            4 => 'Voluntario',
            5 => 'Colaborador',
            6 => 'Director',
            7 => 'Director General',
        ];

        foreach ($roles as $id => $nombreRol) {
            $user = User::create([
                'name' => strtolower(str_replace(' ', '_', $nombreRol)),
                'email' => strtolower(str_replace(' ', '_', $nombreRol)) . '@demo.com',
                'password' => Hash::make('password123'),
                'rol_id' => $id,
            ]);

            $user->perfil()->create([
                'nombres' => $nombreRol,
                'apellidos' => 'Demo',
                'dni' => str_pad($id, 8, '0', STR_PAD_LEFT), // DNI: 00000001, 00000002, etc.
                'fecha_nacimiento' => '1990-01-01',
                'telefono' => '999999999',
                'direccion' => 'Dirección de prueba',
                'genero' => 'No especificado',
                'foto' => null,
            ]);
        }
    }
}

