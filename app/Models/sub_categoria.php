<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sub_categoria extends Model
{
    use HasFactory;
    protected $fillable = [
        'vc_nome',
        'id_categoria'
    ];
}
