<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use GuzzleHttp\Client;

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
 
    public function senha_auth($codigo,Request $req){
        try {
            $dados=User::where('codigo',$codigo)->first();
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
    public function two_factors(Request $req){

        $UserData=$req->only('telefone');
     
        $numeroAleatorio = random_int(1000, 9999);
        $user=User::where('codigo',$numeroAleatorio)->first();
        if($user){
            while($user){
                $numeroAleatorio = random_int(1000, 9999);
                $user=User::where('codigo',$numeroAleatorio)->first();
            }
        }

        // $twilio = new Client(config('services.twilio.sid'), config('services.twilio.token'));
        $apiToken = env('API_TOKEN');
        $sender = env('API_SENDER');
        $nome=$req->name;

        $mensagem = "Teu token para verificar a tua conta é: $numeroAleatorio";

        $numero=$req->telefone;

        $client = new Client();
        $url = 'http://52.30.114.86:8080/mimosms/v1/message/send?token=' . $apiToken;
    
        $data = [
            'sender' => $sender,
            'recipients' => $numero,
            "text" => $mensagem
        ];
        

        try {
            $response = $client->post($url, [
                'json' => $data,
            ]);

            if(! $user=$user->create($UserData))  abort(500,'Error to Create User');

            User::where('telefone',$numero)->update([
                'codigo'=>$numeroAleatorio,
                'status'=>0,
            ]);

            
            return response()
            ->json([
                'data'=>[
                    'mensagem'=>"Mensagem enviada com sucesso",
                    
                ],
            ]);
            
        } catch (\Exception $e) {
            return response()->json(
                [
                    'data'=>[
                    'error' => $e->getMessage(),
                    'mensagem'=>'Numero Telefonico Invalido',   
                    'Erro ao criar conta do Usuario'
                ],
            ], 500);
        }
       
       
    }

    public function verify(Request $req){
        try {
            $bool=User::where('codigo',$req->codigo)->first;
            if($bool){
                return response()->json(
                    [
                        
                        'mensagem'=>'Conta verificada com sucesso',   
                        
                    ], 200);
            }
            else{
                return response()->json(
                    [
                        
                        'mensagem'=>'Infelizmente o token está errado',   
                        
                    ], 200);
            }
        } catch (\Throwable $th) {
            return response()->json(
                [
                    
                    'erro'=>$th,   
                    
                ], 500);
        }
        
    }
}
