<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre_medicamento',
        'tipo_medicamento',
        'cantidad',
        'distribuidor',
        'farmacia_principal',
        'farmacia_secundaria',
    ];

    protected $casts = [
        'farmacia_principal' => 'boolean',
        'farmacia_secundaria' => 'boolean',
    ];
}
