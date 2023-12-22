<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedidos extends Model
{
    use HasFactory;
    protected $fillable = [
        'data',
        'descricao',
        'localizacao',
        'users_id',
        'id_servico_categoria',
        'avaliacao',
        'estrelas',
        'prestador_id',
        
    ];
}
