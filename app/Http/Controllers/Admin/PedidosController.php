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
        ->join('sub_categorias','pedidos.id_servico_categoria','sub_categorias.id')
        ->whereNull('pedidos.prestador_id')
       ->select('users.name as cliente','sub_categorias.vc_nome as pedido','pedidos.*')
        ->get();

        // dd($data);
       return view('admin.pedidos.novos.index',$data);
    }
    public function index(){
        // users_id
//prestador_id
$data['pedidos' ]= Pedidoservico::join('pedidos','pedidoservico.pedidos_id','pedidos.id')
->join('users as clientes', 'pedidos.users_id', '=', 'clientes.id')
->join('users as prestadores', 'pedidos.prestador_id', '=', 'prestadores.id')
->join('sub_categorias','pedidos.id_servico_categoria','sub_categorias.id')
->where('pedidos.estado',0)
->select('sub_categorias.vc_nome as pedido','pedidoservico.*', 'clientes.name as cliente', 'prestadores.name as prestador')
->get();
        // dd($data);
        return view('admin.pedidos.v_pedidos.index',$data);
    }
    public function pedidos_finalizados(){
        $data['pedidos']= Pedidoservico::join('pedidos','pedidoservico.pedidos_id','pedidos.id')
        ->join('users as clientes', 'pedidos.users_id', '=', 'clientes.id')
        ->join('users as prestadores', 'pedidos.prestador_id', '=', 'prestadores.id')
        ->join('sub_categorias','pedidos.id_servico_categoria','sub_categorias.id')
        ->where('pedidos.estado',1)
        ->select('sub_categorias.vc_nome as pedido','pedidoservico.*', 'clientes.name as cliente', 'prestadores.name as prestador')
        ->get();
        return view('admin.pedidos.v_pedidos.index',$data);
    }
    public function pedidos_rejeitados(){
        $data['pedidos']= Pedidoservico::join('pedidos','pedidoservico.pedidos_id','pedidos.id')
        ->join('users as clientes', 'pedidos.users_id', '=', 'clientes.id')
        ->join('users as prestadores', 'pedidos.prestador_id', '=', 'prestadores.id')
        ->join('sub_categorias','pedidos.id_servico_categoria','sub_categorias.id')
        ->where('pedidos.estado',2)
        ->select('sub_categorias.vc_nome as pedido','pedidoservico.*', 'clientes.name as cliente', 'prestadores.name as prestador')
        ->get();
        return view('admin.pedidos.v_pedidos.index',$data);
    }
}
