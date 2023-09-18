<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Racas;

class RacasController extends Controller
{
    //
    public function index(){
        $dados=Racas::all();
        return response()

        ->json([
            'data'=>[
                'data'=>$dados,
            ],
        ]);
    }

    public function store(Request $request){
            $dados=Racas::create([
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
            $dados=Racas::where('id',$id)->update([
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
            $dados=Racas::destroy($id);
            return response()
            ->json([
                'data'=>[
                    'data'=>$dados,
                ],
            ]);
      
    }

    public function list(){


        return view('admin.racas.list');
    }

}
