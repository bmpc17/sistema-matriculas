<?php

namespace Database\Seeders;

use App\Models\Docente;
use App\Models\GradoSeccion;
use Illuminate\Database\Seeder;

class GradoSeccionSeeder extends Seeder
{
    public function run(): void
    {
        $docentes = Docente::where('activo', true)->get();
        $grados = ['1ro Primaria', '2do Primaria', '3ro Primaria', '4to Primaria', '5to Primaria', '6to Primaria'];

        foreach ($grados as $index => $grado) {
            GradoSeccion::factory()->create([
                'docente_id'  => $docentes[$index % $docentes->count()]->id,
                'codigo_aula' => 'P-10' . ($index + 1),
                'grado'       => $grado,
                'seccion'     => 'A',
                'turno'       => 'Mañana',
            ]);
        }

        // Sección cerrada/sin vacantes para probar RN04
        GradoSeccion::factory()->cerrado()->create([
            'docente_id'  => $docentes->first()->id,
            'codigo_aula' => 'P-199',
            'grado'       => '1ro Primaria',
            'seccion'     => 'B',
            'turno'       => 'Tarde',
        ]);
    }
}