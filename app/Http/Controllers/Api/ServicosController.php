<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\servicos;
use App\Models\sub_categoria;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\categoria;
class ServicosController extends Controller
{
    //
    public function categoria(){
        $dados['categorias']=categoria::get();
      
        return response()
        ->json([
            'data'=>[
                'data'=>$dados,
            ],
        ]);
    }
    public function index(){
        $dados['servicos']=sub_categoria::join('categorias','sub_categorias.id_categoria','categorias.id')
        ->select('sub_categorias.*','categorias.vc_nome as categoria')
        ->get();
       
        return response()
        ->json([
            'data'=>[
                'data'=>$dados,
            ],
        ]);
    }
    public function show($id){
        $dados['sub_servicos']=sub_categoria::join('categorias','sub_categorias.id_categoria','categorias.id')
        // ->join('provincias','categoria.provincias_id','provincias.id')
        ->where('id_categoria',$id)
        ->select('sub_categorias.*','categorias.vc_nome as categoria')
        ->get();
       
        return response()
        ->json([
            'data'=>[
                'data'=>$dados,
            ],
        ]);
    }
}
