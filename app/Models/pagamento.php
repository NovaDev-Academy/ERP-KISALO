<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pagamento extends Model
{
    use HasFactory;

    protected $fillable = [
        'pedidos_id',
        'comprovativo',
        'estado',
        'motivo',
    ];
}
