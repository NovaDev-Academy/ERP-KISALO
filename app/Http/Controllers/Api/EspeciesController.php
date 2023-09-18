<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Especies;

class EspeciesController extends Controller
{
    //
    public function index(){
        $dados=Especies::all();
        return response()

        ->json([
            'data'=>[
                'data'=>$dados,
            ],
        ]);
    }

    public function store(Request $request){
    
            $dados=Especies::create([
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

        $dados=Especies::where('id',$id)->update([
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
           $dados=Especies::destroy($id);

            return response()

            ->json([
                'data'=>[
                    'data'=>$dados,
                ],
            ]);
    }

    public function list(){


        return view('admin.especies.list');
    }

    
}



