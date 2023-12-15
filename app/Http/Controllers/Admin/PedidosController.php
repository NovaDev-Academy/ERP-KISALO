<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pedidoservico;
use App\Models\Pedidos;
use App\Models\Pagamento;
class PedidosController extends Controller
{
    //
    public function pedidos_novos(){
        $data['pedidos']=Pedidos::join('users','pedidos.users_id','users.id')
        ->leftjoin('users','pedidos.prestador_id','users.id')
        ->join('sub_categorias','pedidos.id_servico_categoria','sub_categorias.id')
        ->where('prestador_id',null)
        ->get();
        dd($data);
    }
    public function index(){
        $data['pedidos']=Pedidoservico::join('pedidos','pedidoservicos.id_pedido','pedidos.id')
        ->join('users','pedidoservicos.users_id','users.id')
        ->leftjoin('users','pedidos.prestador_id','users.id')
        ->join('sub_categorias','pedidos.id_servico_categoria','sub_categorias.id')
        ->where('pedidos.estado',0)
        ->get();
        dd($data);
    }
    public function pedidos_finalizados(){
        $data['pedidos']=Pedidoservico::join('pedidos','pedidoservicos.id_pedido','pedidos.id')
        ->join('users','pedidoservicos.users_id','users.id')
        ->leftjoin('users','pedidos.prestador_id','users.id')
        ->join('sub_categorias','pedidos.id_servico_categoria','sub_categorias.id')
        ->where('pedidos.estado',1)
        ->get();
        dd($data);
    }
    public function pedidos_rejeitados(){
        $data['pedidos']=Pedidoservico::join('pedidos','pedidoservicos.id_pedido','pedidos.id')
        ->join('users','pedidoservicos.users_id','users.id')
        ->leftjoin('users','pedidos.prestador_id','users.id')
        ->join('sub_categorias','pedidos.id_servico_categoria','sub_categorias.id')
        ->where('pedidos.estado',2)
        ->get();
        dd($data);
    }
}
