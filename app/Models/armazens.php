<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
class armazens extends Model
{
    use HasFactory;
    protected $fillable = [
        'vc_nome',
        'contacto',
        'vc_path',
        'endereco',
        'inicio',
        'fim',
        'id_categoria',
        'id_user',
    ];

    public function user()
    {
        return $this->hasMany(User::class);
    }
}
