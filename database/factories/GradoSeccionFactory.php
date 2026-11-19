<?php

namespace Database\Factories;

use App\Models\GradoSeccion;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Docente;

/**
 * @extends Factory<GradoSeccion>
 */
class GradoSeccionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'docente_id'           => Docente::factory(),
            'codigo_aula'          => fake()->unique()->bothify('AULA-###'),
            'grado'                => fake()->randomElement([
                '1ro Primaria', '2do Primaria', '3ro Primaria',
                '4to Primaria', '5to Primaria', '6to Primaria',
            ]),
            'seccion'              => fake()->randomElement(['A', 'B', 'C']),
            'turno'                => fake()->randomElement(['Mañana', 'Tarde']),
            'vacantes_disponibles' => 25,
            'activo'               => true,
        ];
    }

    public function cerrado(): static
    {
        return $this->state(fn () => [
            'vacantes_disponibles' => 0,
            'activo'               => false,
        ]);
    }
}
