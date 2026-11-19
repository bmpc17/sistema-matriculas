<?php

namespace Database\Factories;

use App\Models\Docente;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Docente>
 */
class DocenteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'dni'          => fake()->unique()->numerify('########'),
            'nombres'      => fake()->firstName(),
            'apellidos'    => fake()->lastName() . ' ' . fake()->lastName(),
            'especialidad' => fake()->randomElement([
                'Educación Primaria', 'Educación Física', 'Inglés', 'Arte y Cultura',
            ]),
            'activo'       => true,
        ];
    }

    public function inactivo(): static
    {
        return $this->state(fn () => ['activo' => false]);
    }
}
