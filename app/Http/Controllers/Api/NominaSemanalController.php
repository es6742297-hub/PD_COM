<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\NominaSemanal;

class NominaSemanalController extends Controller
{
    public function index()
    {
        return NominaSemanal::with('podologo')->get();
    }
    
    public function show(NominaSemanal $nominaSemanal)
    {
        return $nominaSemanal->load('podologo');
    }
}
