<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;
    protected $fillable = [
        'vc_nome',
        'fornecedor',
        'fl_preco',
        'armazens_id',
        'id_categoria_produto',
        'lt_desc',
        'vc_path',
        'expericao_at',
        'it_quantidade',
       
    ];
}
