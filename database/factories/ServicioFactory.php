<?php

namespace Database\Factories;

use App\Models\Servicio;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Servicio>
 */
class ServicioFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre' => ucfirst($this->faker->unique()->words(2, true)),
            'descripcion' => $this->faker->sentence(),
            'precio' => $this->faker->randomFloat(2, 100, 1500),
            'duracion_minutos' => $this->faker->randomElement([15, 30, 45, 60]),
            'activo' => true,
        ];
    }
}
