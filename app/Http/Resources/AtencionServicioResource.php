<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AtencionServicioResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return[
            'id' => $this->id,
            'titulo' => "Atencion Servicio",
            'atrubutos'=> [
                'atencion_id' => $this->atencion_id,
                'servicio_id' => $this->servicio_id,
                'podologo_id' => $this->podologo_id,
                'cantidad' => $this->cantidad,
                'precio_unitario' => $this->precio_unitario,
                'subtotal' => $this->subtotal,
                'comision' => $this->comision,
            ],
        ];
    }
}
