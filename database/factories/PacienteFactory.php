<?php

namespace Database\Factories;

use App\Models\Paciente;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Paciente>
 */
class PacienteFactory extends Factory
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
            'email' => $this->faker->optional()->safeEmail(),
            'fecha_nacimiento' => $this->faker->dateTimeBetween('-90 years', '-5 years')->format('Y-m-d'),
            'direccion' => $this->faker->address(),
            'notas' => $this->faker->optional()->sentence(),
        ];
    }
}
