<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    //
    public function resetPassword(Request $req, User $user){
        if(!Hash::check($req->oldPassword, $user->password)){
            return response()
                ->json([
                    'data' => 'A password antiga nao coincide',
                ], 500);
        }else{
            $user->update([
                'password' => Hash::make($req->password),
            ]);
            return response()
                ->json([
                    'data' => 'Senha alterada com sucesso!',
                ]);

        }
    }
    public function updateData(Request $req, User $user){
        try {
            //code...
            $user->update([
                'name'=>$req->name,
                'email'=>$req->email,
                'telefone' => $req->telefone,
                'genero'=>$req->genero,
                'endereco'=>$req->endereco,
            ]);
            return response()
                ->json([
                    'data' => $user,
                ]);
        } catch (\Throwable $th) {
            //throw $th;
            return response()
                ->json([
                    'data' => 'Erro ao actualizar imagem do usuario',
                ],500);
        }

    }
    public function updateImage(Request $req, User $user){
        try {
            //code...
            if($req->hasFile('vc_path') && $req->file('vc_path')->isValid()){
                // Imagem VC_PATH
                $req_imagem=$req->vc_path;
                $extension=$req_imagem->extension();
                $imagem_name=md5($req_imagem->getClientOriginalName() . strtotime('now')) . "." . $extension;
                $destino=$req_imagem->move(public_path("imagens/galeria"), $imagem_name);
                $dir = "imagens/galeria";
                $caminho=$dir. "/". $imagem_name;
                $user->update([
                    'vc_path' => $caminho,
                ]);
                return response()
                    ->json([
                        'data' => $user,
                    ]);
            }
            else{
                return response()
                    ->json([
                        'data' => 'Insira uma imagem valida!',
                    ],500);
            }
        } catch (\Throwable $th) {
            //throw $th;
            return response()
                ->json([
                    'data' => 'Erro ao actualizar foto do usuario',
                ],500);
        }
    }
    public function alterarTipoConta(){

    }
}
