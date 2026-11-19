<?php

namespace Database\Factories;

use App\Models\Estudiante;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Estudiante>
 */
class EstudianteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'dni'                => fake()->unique()->numerify('########'),
            'nombres'            => fake()->firstName(),
            'apellidos'          => fake()->lastName() . ' ' . fake()->lastName(),
            'fecha_nacimiento'   => fake()->dateTimeBetween('-12 years', '-6 years')
                                          ->format('Y-m-d'),
            'sexo'               => fake()->randomElement(['M', 'F']),
            'telefono_apoderado' => fake()->numerify('9########'),
            'direccion'          => fake()->streetAddress(),
        ];
    }
}
