<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Agendamento;
class AgendamentoController extends Controller
{
    //
    public function index(Request $req){
        $dados['agendamentos']=Agendamento::join('servicos','agendamentos.servicos_id','servicos')
        ->where('animais.id_user',$req->id_user)
        ->join('animais','agendamentos.animais_id','animais.id')
        ->select('animas.vc_nome as animal','animais.id','agendamentos.*','servicos.vc_nome as servico')
        ->get();

        return response()

        ->json([
            'data'=>[
                'data'=>$dados,
            ],
        ]);
    }
    public function store(Request $req){
        $dados=Agendamento::create([
            'servicos_id'=>$req->id_servicos,
            'animais_id'=>$req->id_animais,
            'agendamento'=>$req->agendamento,
        ]);
        if(! $dados)  abort(500,'Error to Create Agendamento');

        return response()

        ->json([
            'data'=>[
                'data'=>$dados,
                'status'=>'ok',
            ],
        ]);
    }
    public function edit(){

        $dados['agendamentos']=Agendamento::join('servicos','agendamentos.servicos_id','servicos')
        ->where('agendamentos.id',$req->id_agendamento)
        ->join('animais','agendamentos.animais_id','animais.id')
        ->select('animas.vc_nome as animal','animais.id','agendamentos.*','servicos.vc_nome as servico')
        ->get();
        return response()

        ->json([
            'data'=>[
                'data'=>$dados,
            ],
        ]);
        return response()

        ->json([
            'data'=>[
                'data'=>$dados,
            ],
        ]);
    }
    public function atualizar(Request $req,$id){
        $dados=Agendamento::where('id',$id)->update([
            'servicos_id'=>$req->id_servicos,
            'animais_id'=>$req->id_animais,
            'agendamento'=>$req->agendamento,
        ]);
        if(! $dados)  abort(500,'Error to Create Agendamento');

       
    }
    public function status(){

    }
}
