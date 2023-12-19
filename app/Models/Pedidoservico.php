<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedidoservico extends Model
{
    use HasFactory;
    protected $table= 'pedidoservico';
    protected $fillable = [
       'estado',
       'users_id',
       'pedidos_id',
       'preco'
    ];
}
