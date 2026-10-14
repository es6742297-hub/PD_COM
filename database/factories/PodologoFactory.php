<?php

namespace Database\Factories;

use App\Models\Podologo;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Podologo>
 */
class PodologoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre' => $this->faker->firstName(),
            'apellidos' => $this->faker->lastName().' '.$this->faker->lastName(),
            'telefono' => $this->faker->numerify('##########'),
            'email' => $this->faker->unique()->safeEmail(),
            'porcentaje_comision' => $this->faker->randomElement([30, 35, 40, 50]),
            'activo' => true,
        ];
    }
}
