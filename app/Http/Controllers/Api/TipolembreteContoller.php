<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tipolembretes;

class TipolembreteContoller extends Controller
{
    //
    public function index(){
        $dados=Tipolembretes::all();

        return response()

        ->json([
            'data'=>[
                'data'=>$dados,
            ],
        ]);
    }

    public function store(Request $request){

            $dados=Tipolembretes::create([
                'nome'=>$request->nome,
            ]);
            return response()

            ->json([
                'data'=>[
                    'data'=>$dados,
                ],
            ]);
    }

    public function update($id, Request $request){

        
            $dados=Tipolembretes::where('id',$id)->update([
                'nome'=>$request->nome
            ]);
            return response()

            ->json([
                'data'=>[
                    'data'=>$dados,
                ],
            ]);

    }

    public function delete($id){
        
            $dados=Tipolembretes::destroy($id);
            return response()

            ->json([
                'data'=>[
                    'data'=>$dados,
                ],
            ]);
      
    }
}
