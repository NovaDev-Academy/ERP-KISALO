<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Storage;
use App\Models\Pedidos;
class pedidosTableHelper
{
    public function userServicos(){
        $pedidos=Pedidos::join('users', 'pedidos.users_id', 'users.id')
        ->join('sub_categorias', 'pedidos.id_servico_categoria', 'sub_categorias.id');

        return $pedidos;
      }
}
