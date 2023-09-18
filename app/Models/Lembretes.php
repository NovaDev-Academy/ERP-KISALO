<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lembretes extends Model
{
    use HasFactory;
     protected $fillable = [
        'id_users',
        'id_tipo_lembrete',
        'frequencia',
        'descricao',
    ];
}
