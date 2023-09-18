<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pracas extends Model
{
    use HasFactory;
    protected $fillable = [
        'vc_nome',
        'provincias_id'

    ];
}
