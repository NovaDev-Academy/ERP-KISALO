<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
class LoginController extends Controller
{
    //
    public function login(request $req, User $user){
        $credentianls=$req->only('email','password');
        if(! auth()->attempt($credentianls)) abort(401,'Invalid Credentials');

        $token=auth()->user()->createToken('auth_token');

        $user=User::where('email',$req->email)->first();

        return response()
        ->json([
            'data'=>[
                'token'=>$token->plainTextToken,
                'user'=>$user,
            ],
        ]);
    }
    public function register(Request $req, User $user){
        $UserData=$req->only('name','email','telefone','endereco','password');

        $UserData['password']=Hash::make($UserData['password']);

        if(! $user=$user->create($UserData))  abort(500,'Error to Create User');
        $credentianls=$req->only('email','password');
        if(! auth()->attempt($credentianls)) abort(401,'Invalid Credentials');

        $token=auth()->user()->createToken('auth_token');

        return response()
        ->json([
            'data'=>[
                'token'=>$token->plainTextToken,
                'user'=>$user,
            ],
        ]);
    }

    public function logout(){

        auth()->user()->currentAccessToken()->delete();

        return response()
        ->json([
            'data'=>[
                'mensagem'=>"Sessão encerrada com sucesso", 
            ],
        ]);
    }
}
