<?php

namespace Database\Factories;

use App\Models\Matricula;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Estudiante;
use App\Models\GradoSeccion;
use App\Models\Docente;


/**
 * @extends Factory<Matricula>
 */
class MatriculaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $inicio = fake()->dateTimeBetween('+1 day', '+10 days');

        return [
            'estudiante_id'    => Estudiante::factory(),
            'grado_seccion_id' => GradoSeccion::factory(),
            'docente_id'       => Docente::factory(),
            'fecha_hora'       => $inicio,
            'fecha_hora_fin'   => (clone $inicio)->modify('+30 minutes'),
            'estado'           => 'pendiente',
        ];
    }
}
