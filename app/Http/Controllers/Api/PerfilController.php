<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
class PerfilController extends Controller
{
    //
    public function index($id){
   
        $dados=User::where('id', $id)->first();

        return response()
        ->json([
            'data'=>[
                'data'=>$dados,
            ],
        ]);
    }
    public function prestador($id){

        $dados=User::where('id', $id)->first();

        return response()
        ->json([
            'data'=>[
                'data'=>$dados,
            ],
        ]);
        
    }
    
}
