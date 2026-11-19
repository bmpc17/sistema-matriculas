<?php

namespace Database\Seeders;

use App\Models\Docente;
use App\Models\User;
use Illuminate\Database\Seeder;

class DocenteSeeder extends Seeder
{
    public function run(): void
    {
        // Docente tutor vinculado al usuario docente@colegio.test
        $usuario = User::where('email', 'docente@colegio.test')->first();
        Docente::factory()->create([
            'user_id'      => $usuario->id,
            'nombres'      => 'Carlos',
            'apellidos'    => 'Mamani Quispe',
            'especialidad' => 'Educación Primaria',
        ]);

        Docente::factory()->count(5)->create();
        Docente::factory()->inactivo()->create();
    }
}