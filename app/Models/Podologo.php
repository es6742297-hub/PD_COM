<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Podologo extends Model
{
    /** @use HasFactory<\Database\Factories\PodologoFactory> */
    use HasFactory;

    protected $fillable = [
        'nombre',
        'apellidos',
        'telefono',
        'email',
        'porcentaje_comision',
        'activo',
    ];

    protected function casts(): array
    {
        return [
            'porcentaje_comision' => 'decimal:2',
            'activo' => 'boolean',
        ];
    }

    public function detalles(): HasMany
    {
        return $this->hasMany(AtencionServicio::class);
    }

    public function nominas(): HasMany
    {
        return $this->hasMany(NominaSemanal::class);
    }
}
