<?php

namespace Database\Factories;

use App\Models\Atencion;
use App\Models\AtencionServicio;
use App\Models\Podologo;
use App\Models\Servicio;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<AtencionServicio>
 */
class AtencionServicioFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $cantidad = $this->faker->numberBetween(1, 3);
        $precio = $this->faker->randomFloat(2, 100, 1500);
        $subtotal = $cantidad * $precio;

        return [
            'atencion_id' => Atencion::factory(),
            'servicio_id' => Servicio::factory(),
            'podologo_id' => Podologo::factory(),
            'cantidad' => $cantidad,
            'precio_unitario' => $precio,
            'subtotal' => $subtotal,
            'comision' => round($subtotal * 0.4, 2),
        ];
    }
}
