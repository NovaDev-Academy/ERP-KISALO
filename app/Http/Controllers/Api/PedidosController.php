<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pedidos;
use App\Models\User;
use App\Models\sub_categoria;
use App\Models\Pedidoservico;
class PedidosController extends Controller
{
    //
    public function index ($user){
        $dados['pedidos']=Pedidos::join('sub_categorias','pedidos.id_servico_categoria','sub_categorias.id')
        ->where('pedidos.users_id',$user)
        ->orderBy('id', 'desc')
        ->select('pedidos.*','sub_categorias.vc_nome as servico')
        ->get();
        return response()
        ->json([
            'data'=>[
                'data'=>$dados,
            ],
        ]);
    }
    public function store(Request $req, $user){
        try {
            $dados['pedidos']=Pedidos::create([
                'data'=>$req->data,
                'descricao'=>$req->descricao,
                'localizacao'=>$req->localizacao,
                'users_id'=>$user,
                'id_servico_categoria'=>$req->id_servico_categoria,
            ]);
            return response()
        ->json([
            'data'=>[
                'data'=>$dados,
            ],
        ]);
        } catch (\Throwable $th) {
            return response()
        ->json([
            'data'=>[
                'mensagem'=>$th,
            ],
        ]);
        }
    }

    public function end($pedido, Request $req){
try {
    if($req->estado == 0){
        Pedidos::where('id',$pedido)->update([
            'avaliacao'=>$req->avaliacao,
            'estrelas'=>$req->estrelas,
            'estado'=>1,
        ]);
    }
    else{
        Pedidos::where('id',$pedido)->update([
            'avaliacao'=>$req->avaliacao,
            'estado'=>2,
        ]);
    }

    return response()
    ->json([
        'data'=>[
            'mensagem'=>"Pedido Finalizado com Sucesso",
        ],
    ]);
} catch (\Throwable $th) {
    return response()
    ->json([
        'data'=>[
            'error'=>500,
            'mensagem'=>"Erro ao Finalizar Pedido",
            "detalhes"=>$th,
        ],
    ]);
}
    }

    public function show($id_pedido){
        try {
            $dados['pedidos']=Pedidoservico::join('users','pedidoservico.users_id','users.id')
                ->where('pedidoservico.pedidos_id',$id_pedido)
                ->select('pedidoservico.*','users.*')
                ->get();
            //$dados['estrelas']=Pedidoservico::join('users','pedidoservico.users_id','users.id')
              //  ->svg('pedidoservico.estrelas as mediaEstrelas')
                //->get();

        return response()
        ->json([
            'data'=>[
                'data'=>$dados,
            ],
        ]);
        } catch (\Throwable $th) {
            return response()
            ->json([
                'data'=>[
                    'error'=>500,
                    'mensagem'=>"Erro ao encontrar prestadores vinculados ao seu pedido",
                    'detalhes'=>$th,
                ],
            ]);
        }
        
    }

    public function close($id_pedido, $id_prestador){
        try {
            //code...
            Pedidos::where('id',$id_pedido)->update([
                'prestador_id'=>$id_prestador
            ]);
            return response()
        ->json([
            'data'=>[
                'mensagem'=>"Prestador aceite com sucesso",
            ],
        ]);
        } catch (\Throwable $th) {
            //throw $th;
            return response()
            ->json([
                'data'=>[
                    'error'=>500,
                    'mensagem'=>"Erro ao vincular prestador ao serviço",
                    "detalhes"=>$th,
                ],
            ]);
        }
       
    }
}
