<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Pagamento;
use App\Models\User;
use App\Models\Pedidos;
use App\Models\Pedidoservico;
use GuzzleHttp\Client;

class PagamentoController extends Controller
{
    //
    public function store(Request $req){
        try {
            if($req->hasFile('comprovativo') && $req->file('comprovativo')->isValid()){
                $req_imagem=$req->comprovativo;
                $extension=$req_imagem->extension();
                $imagem_name=md5($req_imagem->getClientOriginalName() . strtotime('now')) . "." . $extension;
                $destino=$req_imagem->move(public_path("imagens/comprovativos"), $imagem_name);
                $dir = "imagens/comprovativos";
                $caminho=$dir. "/". $imagem_name;
                $numero = $this->genarateNumber();
                $pagamento = Pagamento::create([
                    'numero' => $numero,
                    'user_id' => $req->user_id,
                    'pedido_id'=> $req->pedido_id,
                    'comprovativo'=> $caminho,
                    'estado' => '0',
                ]);
                /*
                $currentDate = Carbon::now();
                $data = Pedidos::where('id', $req->pedido_id)->first();
                $pedidoServico = Pedidoservico::where('pedidos_id',$data->id)->first();
                $user = User::where('id',$data->users_id)->first();
                $apiToken = env('API_TOKEN');
                $sender = env('API_SENDER');
                $nome = $user->name;
                $mensagem = "Olá, $nome 
                
                Confirmação de Pagamento:
                
                Fatura Nº: $pagamento->numero
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
                */
                return response()
                ->json([
                    'data'=>'Pagamento recebido com sucesso!',
                ]);
            }else{
                return response()
                ->json([
                    'data'=>'Insira um comprovativo!',
                ],500);
            }
        
        } catch (\Throwable $th) {
            //throw $th;
            //dd($th);
            return response()
            ->json([
                'data'=>'Erro ao efetuar pagamento! '. $this->genarateNumber().'|'. $th,
            ],500);
      }  
   
    }
    public function index(User $user){
        try {
            //code...
            $pagamentos = Pagamento::where('pagamentos.user_id', $user->id)
            ->join('pedidos','pagamentos.pedido_id','pedidos.id')
            ->leftjoin('users','pedidos.prestador_id','users.id')
            ->leftjoin('sub_categorias','pedidos.id_servico_categoria','sub_categorias.id')
            ->orderBy('id', 'desc')
            ->select('pagamentos.*','users.name as prestador','sub_categorias.vc_nome as servico')
            ->get();
            return response()
            ->json([
                'data'=> $pagamentos,
            ]);
        } catch (\Throwable $th) {
            //throw $th;
            return response()
            ->json([
                'data'=> 'Erro ao listar pagamentos',
            ],500);
        } 

    }
    public  function genarateNumber(){
        $numeroAleatorio = random_int(1000, 9999);
        $pagamentos = Pagamento::get();
        foreach($pagamentos as $pagamento){
            if($pagamento->numero == $numeroAleatorio){
                $numeroAleatorio = random_int(1000, 9999);
            } else{

                return $numeroAleatorio;  
            } 
            }
            return $numeroAleatorio;    
        }

    
  
}
