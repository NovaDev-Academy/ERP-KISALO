<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tipolembretes extends Model
{
    use HasFactory;
     protected $fillable = [
        'nome',
    ];
}
