<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use GuzzleHttp\Client;
class LoginController extends Controller
{
    //
    public function login(request $req, User $user){
        $credentianls=$req->only('telefone','password');

        // Verificando se as credencias estam certas
        if(! auth()->attempt($credentianls)) abort(401,'Invalid Credentials');

        $token=auth()->user()->createToken('auth_token');

        $user=User::where('telefone',$req->telefone)->first();

        return response()
        ->json([
            'data'=>[
                'token'=>$token->plainTextToken,
                'user'=>$user,
            ],
        ]);
    }
    public function register(Request $req, User $user){

        $UserData=$req->only('name','telefone','vc_tipo_utilizador','password');

        $UserData['password']=Hash::make($UserData['password']);
        $numeroAleatorio = random_int(1000, 9999);

        // $twilio = new Client(config('services.twilio.sid'), config('services.twilio.token'));
        $apiToken = env('API_TOKEN');
        $sender = env('API_SENDER');
        $nome=$req->name;

        $mensagem = "Seja bem vindo ao KISALO Sr.$nome!O teu codigo de verificação é  $numeroAleatorio.";

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

        

            $credentianls=$req->only('telefone','password');
            if(! auth()->attempt($credentianls)) abort(401,'Invalid Credentials');

            $token=auth()->user()->createToken('auth_token');

            return response()
            ->json([
                'data'=>[
                    'token'=>$token->plainTextToken,
                    'user'=>$user,
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
        // if ($message->status == 'sent' || $message->status == 'queued') {
              
        // } else {
        //     return response()
        //     ->json([
        //         'data'=>[
        //             'mensagem'=>'Numero Telefonico Invalido',
                 
        //         ],
        //     ]);
        // }
       
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
