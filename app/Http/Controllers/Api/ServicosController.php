<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\servicos;
use App\Models\sub_categoria;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
class ServicosController extends Controller
{
    //
    public function index(){
        $dados['servicos']=servicos::join('armazens','servicos.armazens_id','armazens.id')
        // ->leftjoin('sub_categorias','servicos.id_tamanho','sub_categorias.id')
        ->leftjoin('sub_categorias','servicos.id_servico_categoria','sub_categorias.id')
        ->select('armazens.vc_nome as estabelecimento','servicos.*','sub_categorias.vc_nome as categoria_servico')
        ->get();


        return response()
        ->json([
            'data'=>[
                'data'=>$dados,
            ],
        ]);
    }
    public function show($id){
        $dados['servicos']=servicos::join('armazens','servicos.armazens_id','armazens.id')
        // ->leftjoin('sub_categorias','servicos.id_tamanho','sub_categorias.id')
        ->leftjoin('sub_categorias','servicos.id_servico_categoria','sub_categorias.id')
        ->select('armazens.vc_nome as estabelecimento','servicos.*','sub_categorias.vc_nome as categoria_servico')
        ->where('servicos.id',$id)
        ->first();


        return response()
        ->json([
            'data'=>[
                'data'=>$dados,
            ],
        ]);
    }
}
