<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Animais;
use App\Models\Especies;
use App\Models\Racas;
use App\Models\User;

class AnimaisController extends Controller
{
    //
    public function index(){
        // $especies= Especies::all();
        // $racas = Racas::all();
        // $users = User::all();

        $dados=$animais=Animais::join('especies','especies.id', 'animais.id_especie')
        ->join('racas', 'racas.id', 'animais.id_racas')
        ->join('users', 'users.id', 'animais.id_users')
        ->select('animais.*', 'especies.nome as nome_esp', 'racas.nome as nome_raca', 'users.name as name')
        ->orderBy('id')->get();

        return response()

        ->json([
            'data'=>[
                'data'=>$dados,
            ],
        ]);
    }

    public function store(Request $request){
           
            $dados=Animais::create([
                'nome'=>$request->nome,
                'genero'=>$request->genero,
                'peso'=>$request->peso,
                'id_especie'=>$request->especies,
                'id_racas' => $request->racas,
                'id_users'=>$request->users,
                'data_nascimento'=>$request->data_nascimento,
                
            ]);
            return response()

        ->json([
            'data'=>[
                'data'=>$dados,
            ],
        ]);
    }

    public function update($id, Request $request){

            $dados=Animais::where('id',$id)->update([
                'nome'=>$request->nome,
                'genero'=>$request->genero,
                'peso'=>$request->peso,
                'id_especie'=>$request->especies,
                'id_racas'=>$request->raca,
                'id_users'=>$request->users,
                'data_nascimento'=>$request->data_nascimento,
            ]);
            return response()

            ->json([
                'data'=>[
                    'data'=>$dados,
                ],
            ]);

    }

    public function delete($id){
        
            $dados=Animais::destroy($id);
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
