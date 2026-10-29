<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\Api\PodologoController;
use App\Http\Controllers\Api\NominaSemanalController;
use App\Http\Controllers\Api\AtencionServicioController;

Route::apiResource('podologo', PodologoController::class);
Route::apiResource('nominasemanal', NominaSemanalController::class);
Route::apiResource('atencionservicio', AtencionServicioController::class);



    