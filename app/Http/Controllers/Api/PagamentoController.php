<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\servicos;
use App\Models\sub_categoria;
use App\Models\categoria;
use App\Models\Pedidos;
use App\Models\pagamento;
use App\Models\Pedidoservico;
use GuzzleHttp\Client;
use Carbon\Carbon;
class PagamentoController extends Controller
{
    //
    public function index($id){
        try {
            $dados['pagamentos']=pagmento::where('pedidos_id',$id)->first();
            return response()
            ->json([
                'data'=>[
                    'data'=>$dados,
                ],
            ]);
        } catch (\Throwable $th) {
            return response()
            ->json([
                'data'=>[
                    'mensagem'=>"Comprovativo não encontrado",
                    'data'=>$th,
                ],
            ]);
        }
       
    }
    public function store($id,Request $req){
        if($req->hasFile('comprovativo') && $req->file('comprovativo')->isValid()){
            $req_imagem=$req->comprovativo;
            $extension=$req_imagem->extension();
            $imagem_name=md5($req_imagem->getClientOriginalName() . strtotime('now')) . "." . $extension;
            $destino=$req_imagem->move(public_path("documentos/pagamentos"), $imagem_name);
            $dir = "documentos/pagamentos";
            $caminho=$dir. "/". $imagem_name;

            pagamento::create([
                'pedidos_id'=>$id,
                'comprovativo'=>$caminho,
            ]);
            $currentDate = Carbon::now();
            $data=Pedidos::where('id',$id)->first();

            $pedidoServico=Pedidoservico::where('pedidos_id',$id)->first();

            $user=User::where('id',$data->users_id)->first();
            $numeroAleatorio = random_int(1000, 9999);
            $apiToken = env('API_TOKEN');
            $sender = env('API_SENDER');
            $nome=$user->name;
    
            $mensagem = "Olá $nome 
            
            Confirmação de Pagamento:
            
            Fatura Nº: $numeroAleatorio
            Valor Pago: $pedidoServico->preco
            Data do Pagamento:  $currentDate
            
            Seu pagamento foi recebido com sucesso. Agradecemos por sua pontualidade.
            
            Em caso de dúvidas ou problemas, entre em contato conosco.
            
            Atenciosamente,
            KISALO
           ";
    
            $numero=$user->telefone;

            $client = new Client();
            $url = 'http://52.30.114.86:8080/mimosms/v1/message/send?token=' . $apiToken;
        
            $data = [
                'sender' => $sender,
                'recipients' => $numero,
                "text" => $mensagem
            ];
            
            
                $response = $client->post($url, [
                    'json' => $data,
                ]);

            return response()
            ->json([
                'data'=>[
                    'data'=>"Pagamento Realizado com sucesso",
                ],
            ]);
        }
    }
 
}
