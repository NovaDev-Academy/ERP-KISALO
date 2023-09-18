<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Animais extends Model
{
    use HasFactory;
    protected $fillable = [
        'nome',
        'genero',
        'peso',
        'id_estabelecimento',
        'id_racas',
        'id_users',
        'data_nascimento',
    ];
    

}
