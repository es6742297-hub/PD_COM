<?php

namespace Database\Factories;

use App\Models\NominaSemanal;
use App\Models\Podologo;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<NominaSemanal>
 */
class NominaSemanalFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $inicio = $this->faker->dateTimeBetween('-2 months', '-1 week')->modify('monday this week');
        $ventas = $this->faker->randomFloat(2, 2000, 20000);
        $comisiones = round($ventas * 0.4, 2);
        $bonos = $this->faker->randomElement([0, 100, 200]);
        $descuentos = $this->faker->randomElement([0, 50]);

        return [
            'podologo_id' => Podologo::factory(),
            'fecha_inicio' => $inicio->format('Y-m-d'),
            'fecha_fin' => (clone $inicio)->modify('+6 days')->format('Y-m-d'),
            'total_servicios' => $this->faker->numberBetween(5, 40),
            'total_ventas' => $ventas,
            'total_comisiones' => $comisiones,
            'bonos' => $bonos,
            'descuentos' => $descuentos,
            'total_pagar' => $comisiones + $bonos - $descuentos,
            'estado' => $this->faker->randomElement(['pendiente', 'pagada']),
            'pagado_en' => null,
        ];
    }
}
