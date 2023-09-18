<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class servicos extends Model
{
    use HasFactory;
    protected $fillable = [
        'vc_nome',
        'preco',
        'armazens_id',
        'id_servico_categoria',
        'lt_desc',
    ];
}
