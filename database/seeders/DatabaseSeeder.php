<?php

namespace Database\Seeders;

use App\Models\Atencion;
use App\Models\AtencionServicio;
use App\Models\Paciente;
use App\Models\Podologo;
use App\Models\Servicio;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        $servicios = Servicio::factory(8)->create();
        $podologos = Podologo::factory(4)->create();
        $pacientes = Paciente::factory(30)->create();

        foreach (range(1, 60) as $_) {
            $atencion = Atencion::factory()->create(['paciente_id' => $pacientes->random()->id]);
            $total = 0;

            foreach ($servicios->random(rand(1, 3)) as $servicio) {
                $podologo = $podologos->random();
                $cantidad = rand(1, 2);
                $subtotal = $servicio->precio * $cantidad;
                $total += $subtotal;

                AtencionServicio::create([
                    'atencion_id' => $atencion->id,
                    'servicio_id' => $servicio->id,
                    'podologo_id' => $podologo->id,
                    'cantidad' => $cantidad,
                    'precio_unitario' => $servicio->precio,
                    'subtotal' => $subtotal,
                    'comision' => round($subtotal * $podologo->porcentaje_comision / 100, 2),
                ]);
            }

            $atencion->update(['total' => $total]);
        }
    }
}
