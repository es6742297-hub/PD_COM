<?php

namespace Database\Factories;

use App\Models\Atencion;
use App\Models\Paciente;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Atencion>
 */
class AtencionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'paciente_id' => Paciente::factory(),
            'fecha' => $this->faker->dateTimeBetween('-1 month', 'now'),
            'total' => 0,
            'metodo_pago' => $this->faker->randomElement(['efectivo', 'tarjeta', 'transferencia']),
            'estado' => $this->faker->randomElement(['pendiente', 'completada', 'cancelada']),
            'observaciones' => $this->faker->optional()->sentence(),
        ];
    }
}
