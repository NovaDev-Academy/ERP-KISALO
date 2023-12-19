<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
class PerfilController extends Controller
{
    //
    public function index($id){
   
        $dados=User::where('id',$id)->get();

        return response()
        ->json([
            'data'=>[
                'data'=>$dados,
            ],
        ]);
    }
    public function update($id, Request $req){
   
        $dados=User::where('id', $id)->update([
            'name'=>$req->name,
            'sobrename'=>$req->sobrename,
            'email'=>$req->email,
            // 'password'=>$req->password,
            'genero'=>$req->genero,
            'endereco'=>$req->endereco,
            'telefone'=>$req->telefone,
        ]);

        return response()
        ->json([
            'data'=>[
                'data'=>$dados,
                'mensagem'=>'Pefil Atualizado com sucesso',
            ],
        ]);
    }
    public function senha($id,Request $req){
        try {
            $dados=User::where('id',$id)->first();
            if(Hash::check($req->get('password'), $dados->password)){
                  
                if($req->confirm_password == $req->new_password){
                    User::where('id',$id)->update([
                        'password'=>Hash::make($req->new_password)
                    ]);
                     return response()
                    ->json([
                        'data'=>[
                            'mensagem'=>"Password alterada com sucesso",
                        ],200
                    ]);
                }
                 
    
                else{
                    return response()
                    ->json([
                        'data'=>[
                            'mensagem'=>"As Password's não combinam",
                        ],400
                    ]);
                }
                
            }
            else{
                return response()
                    ->json([
                        'data'=>[
                            'mensagem'=>"A password antiga está incorreta",
                        ],400
                    ]);
            }
        } catch (\Throwable $th) {
            return response()
                    ->json([
                        'data'=>[
                            'mensagem'=>"Erro do Servidor",
                            'erro'=>$th
                        ],500
                    ]);
        }
      

      
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
