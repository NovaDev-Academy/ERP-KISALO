<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    use HasFactory;
    protected $fillale = [
        'lt_desc',
        'it_star',
        'id_produtos',
        'id_users',
    ];
}
