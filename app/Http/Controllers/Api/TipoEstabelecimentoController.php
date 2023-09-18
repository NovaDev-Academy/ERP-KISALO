<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\categoria;
class TipoEstabelecimentoController extends Controller
{
    public function index(){
        $dados['armazems']=categoria::all();
        return response()

        ->json([
            'data'=>[
                'data'=>$dados,
            ],
        ]);
    }
    public function show($id){
        $dados['armazems']=categoria::join('armazens','armazens.id_categoria','categorias.id')
        ->join('users','armazens.id_user','users.id')
        // ->join('provincias','categoria.provincias_id','provincias.id')
        ->select('armazens.*','users.name as user','categorias.vc_nome as categoria')
        ->where('armazens.id_categoria',$id)
        ->first();
        return response()

        ->json([
            'data'=>[
                'data'=>$dados,
            ],
        ]);
    }

}
