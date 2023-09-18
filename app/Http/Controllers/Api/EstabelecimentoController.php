<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\armazens;
use App\Models\categoria;
use Illuminate\Support\Facades\Auth;
use App\Models\Produto;
use App\Models\sub_categoria;
use App\Models\Imagens;
use App\Models\Cor;
class EstabelecimentoController extends Controller
{
    //
    public function index(){
        $dados['armazems']=armazens::join('users','armazens.id_user','users.id')
        ->join('categorias','armazens.id_categoria','categorias.id')
        // ->join('provincias','categoria.provincias_id','provincias.id')
        ->select('armazens.*','users.name as user','categorias.vc_nome as categoria')
        ->get();
        return response()

        ->json([
            'data'=>[
                'data'=>$dados,
            ],
        ]);
    }

    public function show($id){
        $dados['armazems']=armazens::join('users','armazens.id_user','users.id')
        ->join('categorias','armazens.id_categoria','categorias.id')
        // ->join('provincias','categoria.provincias_id','provincias.id')
        ->select('armazens.*','users.name as user','categorias.vc_nome as categoria')
        ->where('armazens.id',$id)
        ->first();

        $dados['produtos']=Produto::join('armazens','produtos.armazens_id','armazens.id')
        // ->leftjoin('sub_categorias','produtos.id_tamanho','sub_categorias.id')
        ->leftjoin('cors','produtos.id_categoria_produto','cors.id')
        ->select('armazens.vc_nome as estabelecimento','produtos.*','cors.vc_nome as categoria_produto')
       ->where('produtos.armazens_id',$id)
        ->get();
        return response()
        ->json([
            'data'=>[
                'data'=>$dados,
            ],
        ]);
    }
    
}
