<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Lembretes;
use App\Models\User;
use App\Models\Tipolembretes;

class LembretesController extends Controller
{
    //
    public function index(){
        // $tipolembretes = Tipolembretes::all();
        // $users = User::all();

        $dados=Lembretes::join('users','users.id', 'lembretes.id_users')
        ->join('tipolembretes', 'tipolembretes.id', 'lembretes.id_tipo_lembrete')
        ->select('lembretes.*', 'users.name as name', 'tipolembretes.nome as nome_tipo_lembrete', )
        ->orderBy('id')->get();

        return response()

        ->json([
            'data'=>[
                'data'=>$dados,
            ],
        ]);
    }

    public function store(Request $request){

            $dados=Lembretes::create([
                'id_users'=>$request->users,
                'id_tipo_lembrete'=>$request->tipolembrete,
                'frequencia'=>$request->frequencia,
                'descricao'=>$request->descricao,
            ]);
            return response()

        ->json([
            'data'=>[
                'data'=>$dados,
            ],
        ]);
    }

    public function update($id, Request $request){
           $dados= Lembretes::where('id',$id)->update([
                'id_users'=>$request->users,
                'id_tipo_lembrete'=>$request->tipolembrete,
                'frequencia'=>$request->frequente,
                'descricao'=>$request->descricao,
            ]);
            return response()

            ->json([
                'data'=>[
                    'data'=>$dados,
                ],
            ]);

    }

    public function delete($id){
            $dados=Lembretes::destroy($id);
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
