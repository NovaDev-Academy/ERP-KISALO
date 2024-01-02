<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Notificacao;
class NotificacaoController extends Controller
{
    //
    public function index($id_user){
        $data['notificao']=Notificao::where('user_id',$id_user)->get();

        return response()
        ->json([
            'data'=>$data,
        ]);
    }
    public function show(Notificacao $notificacao){
        
        return response()
        ->json([
            'data'=>$notificacao,
        ]);
    }
}
