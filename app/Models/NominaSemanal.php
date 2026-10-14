<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class NominaSemanal extends Model
{
    /** @use HasFactory<\Database\Factories\NominaSemanalFactory> */
    use HasFactory;

    protected $fillable = [
        'podologo_id',
        'fecha_inicio',
        'fecha_fin',
        'total_servicios',
        'total_ventas',
        'total_comisiones',
        'bonos',
        'descuentos',
        'total_pagar',
        'estado',
        'pagado_en',
    ];

    protected function casts(): array
    {
        return [
            'fecha_inicio' => 'date',
            'fecha_fin' => 'date',
            'total_ventas' => 'decimal:2',
            'total_comisiones' => 'decimal:2',
            'bonos' => 'decimal:2',
            'descuentos' => 'decimal:2',
            'total_pagar' => 'decimal:2',
            'pagado_en' => 'datetime',
        ];
    }

    public function podologo(): BelongsTo
    {
        return $this->belongsTo(Podologo::class);
    }
}
