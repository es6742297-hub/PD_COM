<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Requests\StoreAtencionServicioRequest;
use App\Http\Requests\UpdateAtencionServicioRequest;
use App\Models\AtencionServicio;
use App\Http\Resources\AtencionServicioResource;
use App\Http\Resources\AtencionServicioCollection;

class AtencionServicioController extends Controller
{
     public function index()
    {
        return AtencionServicioCollection::collection(AtencionServicio::all());
    }

    public function show(AtencionServicio $atencionServicio)
    {
        return new AtencionServicioResource($atencionServicio->load('atencion', 'servicio'));
        
    }
    
    public function store(StoreAtencionServicioRequest $request){ 
        $atencionServicio = AtencionServicio::create($request->all()); 
        return response()->json(new AtencionServicioResource($atencionServicio), Response::HTTP_CREATED); // 201 Created 
    }

    public function update(UpdateAtencionServicioRequest $request, AtencionServicio $atencionServicio){ 
        $atencionServicio->update($request->all()); 
        return response()->json(new AtencionServicioResource($atencionServicio), Response::HTTP_OK); // 200 
    }

    public function destroy(AtencionServicio $atencionServicio){ 
        $atencionServicio->delete();
        return response()->json(null, Response::HTTP_NO_CONTENT); // 204 No Content 
    }
}
