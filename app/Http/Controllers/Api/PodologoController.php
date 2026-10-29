<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StorePodologoRequest;
use App\Http\Requests\UpdatePodologoRequest;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Podologo;
use App\Http\Resources\PodologoResource;

class PodologoController extends Controller
{
    public function index()
    {
        return PodologoResource::collection(Podologo::with('nominas')->get());
    }

    public function show(Podologo $podologo)
    {
        return new PodologoResource($podologo->load('nominas'));
    }

    public function store(StorePodologoRequest $request){ 
        $podologo = Podologo::create($request->all()); 
        return response()->json(new PodologoResource($podologo), Response::HTTP_CREATED); // 201 Created 
    }

    public function update(UpdatePodologoRequest $request, Podologo $podologo){ 
        $podologo->update($request->all()); 
        return response()->json(new PodologoResource($podologo), Response::HTTP_OK); // 200 
    }

    public function destroy(Podologo $podologo){ 
        $podologo->delete();
        return response()->json(null, Response::HTTP_NO_CONTENT); // 204 No Content 
    }
}
