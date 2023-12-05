<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pagamento;
use App\Models\User;
use App\Models\Pedidos;

class PagamentoController extends Controller
{
    //
    public function store(Request $req){
        try {
            if($req->hasFile('comprovativo') && $req->file('comprovativo')->isValid()){
                $req_imagem=$req->comprovativo;
                $extension=$req_imagem->extension();
                $imagem_name=md5($req_imagem->getClientOriginalName() . strtotime('now')) . "." . $extension;
                $destino=$req_imagem->move(public_path("imagens/comprovativos"), $imagem_name);
                $dir = "imagens/comprovativos";
                $caminho=$dir. "/". $imagem_name;
                Pagamento::create([
                    'user_id' => $req->user_id,
                    'pedido_id'=> $req->pedido_id,
                    'comprovativo'=> $caminho,
                    'estado' => '0',
                ]);
                return response()
                ->json([
                    'data'=>'Pagamento feito com sucesso!',
                ]);
            }else{
                return response()
                ->json([
                    'data'=>'Insira um comprovativo!',
                ],500);
            }
        
        } catch (\Throwable $th) {
            //throw $th;
            //dd($th);
            return response()
            ->json([
                'data'=>'Erro ao efetuar pagamento!',
            ],500);
      }  
   
    }
    public function index(User $user){
        try {
            //code...
            $pagamentos = Pagamento::where('pagamentos.user_id', $user->id)
            ->join('pedidos','pagamentos.pedido_id','pedidos.id')
            ->leftjoin('users','pedidos.prestador_id','users.id')
            ->leftjoin('sub_categorias','pedidos.id_servico_categoria','sub_categorias.id')
            ->select('pagamentos.*','users.name as prestador','sub_categorias.vc_nome as servico')
            ->get();
            return response()
            ->json([
                'data'=> $pagamentos,
            ]);
        } catch (\Throwable $th) {
            //throw $th;
            return response()
            ->json([
                'data'=> 'Erro ao listar pagamentos',
            ],500);
        } 

    }
}
