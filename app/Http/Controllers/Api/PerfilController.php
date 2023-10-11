<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
class PerfilController extends Controller
{
    //
    public function index(){
        $id=Auth::user()->id;
        $dados=User::where('id', $id)->get();

        return response()
        ->json([
            'data'=>[
                'data'=>$dados,
            ],
        ]);
    }
    
}
