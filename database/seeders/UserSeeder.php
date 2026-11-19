<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // La contraseña de los tres usuarios es: password
        User::factory()->create([
            'name'  => 'Director Administrador',
            'email' => 'director@colegio.test',
            'rol'   => 'administrador',
        ]);
        User::factory()->create([
            'name'  => 'Carlos Mamani',
            'email' => 'docente@colegio.test',
            'rol'   => 'docente',
        ]);
        User::factory()->create([
            'name'  => 'Secretaría Admisión',
            'email' => 'secretaria@colegio.test',
            'rol'   => 'secretaria',
        ]);
    }
}