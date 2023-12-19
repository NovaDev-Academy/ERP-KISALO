<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pedidoservico;
use App\Models\User;
use App\Models\Pedidos;
use Laravel\Ui\Presets\React;

class PedidoservicoController extends Controller
{
    //
    public function index(){
        $users = User::get();
        $pedidos = Pedidos::join('sub_categorias','pedidos.id_servico_categoria','sub_categorias.id')
        ->select('pedidos.*','sub_categorias.vc_nome as nome')
        ->where('estado', 0)
        ->get();
        // dd($pedidos);

        return view('admin.pedidoservico.index', compact('users', 'pedidos'));
    }
    public function historico(){
        $users = User::get();
        $pedidos = Pedidos::join('sub_categorias','pedidos.id_servico_categoria','sub_categorias.id')
        ->leftjoin('users','users.id', 'pedidos.prestador_id')
        ->leftjoin('pagamentos','pagamentos.pedido_id', 'pedidos.id')
        ->leftjoin('pedidoservico','pedidoservico.pedidos_id', 'pedidos.id')
        ->select('pedidos.*','sub_categorias.vc_nome as nome', 'users.name as prestadorName','users.sobrename as prestadorLastName', 'pedidoservico.preco as preco', 'pagamentos.estado as pagamentoEstado')
        ->where('pedidos.estado','!=', 0)

      //  ->groupBy('pedidos.id')
        ->get();
        // dd($pedidos);

        return view('admin.pedidoservico.antigos_pedidos', compact('users', 'pedidos'));

    }

    public function show($id, $idpedido){
        $users = User::join('servicos', 'servicos.users_id', 'users.id')
        ->select('users.*','users.id', 'users.name','servicos.max as precoMaxServico','servicos.min as precoMinServico')
        ->whereIn('users.vc_tipo_utilizador', [2, 3])
        ->where('servicos.id_servico_categoria',$id )
        ->get();
        
        // dd($users);
        return view('admin.pedidoservico.prestador', compact('users', 'idpedido'));
    }

    public function vincular(Request $request){
        
        try {
            //code...
            Pedidoservico::create([
                'users_id'=>$request->user,
                'pedidos_id'=>$request->idpedido,
                'preco' =>$request->preco,
            ]);
            
            return redirect()->back()->with('status',1);
        }catch (\Throwable $th) {
            // dd($th);
            return redirect()->back()->with("status_f", '1');
        }
    }
}

