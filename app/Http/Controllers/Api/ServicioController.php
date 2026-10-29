<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Servicio;
use Illuminate\Database\Eloquent\Collection;

class ServicioController extends Controller
{
    public function index(): Collection
    {
        return Servicio::with([
            'detalles:id,atencion_id,servicio_id,podologo_id,cantidad,precio_unitario,subtotal,comision',
            'detalles.podologo:id,nombre,apellidos',
            'detalles.atencion:id,paciente_id,fecha',
            'detalles.atencion.paciente:id,nombre,apellidos',
        ])->get();
    }

    public function show(Servicio $servicio): Servicio
    {
        return $servicio->load([
            'detalles:id,atencion_id,servicio_id,podologo_id,cantidad,precio_unitario,subtotal,comision',
            'detalles.podologo:id,nombre,apellidos',
            'detalles.atencion:id,paciente_id,fecha',
            'detalles.atencion.paciente:id,nombre,apellidos',
        ]);
    }
}
