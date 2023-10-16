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
        $users=User:: get();
        $pedidos=Pedidos::join('sub_categorias','pedidos.id_servico_categoria','sub_categorias.id')
        ->select('pedidos.*','sub_categorias.vc_nome as nome')
        ->where('estado', 0)

        ->get();
        // dd($pedidos);

        return view('admin.pedidoservico.index', compact('users', 'pedidos'));
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
                'pedidos_id'=>$request->idpedido
            ]);
            return redirect()->back()->with('status',1);
        }catch (\Throwable $th) {
            // dd($th);
            return redirect()->back()->with("status_f", '1');
        }
    }
}

