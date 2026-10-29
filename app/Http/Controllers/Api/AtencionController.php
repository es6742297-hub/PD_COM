<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Atencion;

class AtencionController extends Controller
{
    public function index()
    {
        return Atencion::with('paciente', 'detalles.servicio', 'detalles.podologo')->get();
    }

    public function show(Atencion $atencion)
    {
        return $atencion->load('paciente', 'detalles.servicio', 'detalles.podologo');
    }
}
