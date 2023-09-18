<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Produto;
use App\Models\categoria;
use App\Models\sub_categoria;
use App\Models\Imagens;
use App\Models\Cor;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
class ProdutosController extends Controller
{
    public function index(){
        $dados['produtos']=Produto::join('armazens','produtos.armazens_id','armazens.id')
        // ->leftjoin('sub_categorias','produtos.id_tamanho','sub_categorias.id')
        ->leftjoin('cors','produtos.id_categoria_produto','cors.id')
        ->select('armazens.vc_nome as estabelecimento','produtos.*','cors.vc_nome as categoria_produto')
        ->get();


        return response()
        ->json([
            'data'=>[
                'data'=>$dados,
            ],
        ]);
    }

    public function show($id){
        $dados['produtos']=Produto::join('armazens','produtos.armazens_id','armazens.id')
        // ->leftjoin('sub_categorias','produtos.id_tamanho','sub_categorias.id')
        ->leftjoin('cors','produtos.id_categoria_produto','cors.id')
        ->select('armazens.vc_nome as estabelecimento','produtos.*','cors.vc_nome as categoria_produto')
        ->where('produtos.id',$id)
        ->first();


        return response()
        ->json([
            'data'=>[
                'data'=>$dados,
            ],
        ]);
    }
}
