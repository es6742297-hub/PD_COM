<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AtencionServicio extends Model
{
    /** @use HasFactory<\Database\Factories\AtencionServicioFactory> */
    use HasFactory;

    protected $fillable = [
        'atencion_id',
        'servicio_id',
        'podologo_id',
        'cantidad',
        'precio_unitario',
        'subtotal',
        'comision',
    ];

    protected function casts(): array
    {
        return [
            'precio_unitario' => 'decimal:2',
            'subtotal' => 'decimal:2',
            'comision' => 'decimal:2',
        ];
    }

    public function atencion(): BelongsTo
    {
        return $this->belongsTo(Atencion::class);
    }

    public function servicio(): BelongsTo
    {
        return $this->belongsTo(Servicio::class);
    }

    public function podologo(): BelongsTo
    {
        return $this->belongsTo(Podologo::class);
    }
}
