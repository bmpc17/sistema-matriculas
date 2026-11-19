<?php

namespace Database\Factories;

use App\Models\SeguimientoAcademico;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Matricula;

/**
 * @extends Factory<SeguimientoAcademico>
 */
class SeguimientoAcademicoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'matricula_id'      => Matricula::factory(),
            'nota_final'        => fake()->randomFloat(2, 11, 20),
            'total_asistencias' => fake()->numberBetween(35, 45),
            'total_faltas'      => fake()->numberBetween(0, 5),
            'observaciones'     => fake()->optional()->sentence(),
        ];
    }
}
