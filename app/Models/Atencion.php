<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Atencion extends Model
{
    /** @use HasFactory<\Database\Factories\AtencionFactory> */
    use HasFactory, SoftDeletes;

    protected $table = 'atenciones';

    protected $fillable = [
        'paciente_id',
        'fecha',
        'total',
        'metodo_pago',
        'estado',
        'observaciones',
    ];

    protected function casts(): array
    {
        return [
            'fecha' => 'datetime',
            'total' => 'decimal:2',
        ];
    }

    public function paciente(): BelongsTo
    {
        return $this->belongsTo(Paciente::class);
    }

    public function detalles(): HasMany
    {
        return $this->hasMany(AtencionServicio::class);
    }
}
