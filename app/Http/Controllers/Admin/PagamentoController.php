<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Notificacao;
use App\Models\Pagamento;
use App\Models\Pedidos;
use App\Models\User;
use Mpdf\Mpdf;

class PagamentoController extends Controller
{
    //
    public function index(){
        $pedidos = Pedidos::get();
        $pagamentos = Pagamento::join('pedidos','pagamentos.pedido_id','pedidos.id')
        ->leftjoin('users','pedidos.prestador_id','users.id')
        ->leftjoin('pedidoservico','pedidoservico.pedidos_id','pedidos.id')
        ->leftjoin('sub_categorias','pedidos.id_servico_categoria','sub_categorias.id')
        ->orderBy('pagamentos.id','desc')
        ->select('pagamentos.*','users.name as prestador','sub_categorias.vc_nome as servico', 'pedidoservico.preco  as preco')
        ->get();
        $clientes = User::get();
        return view('admin.pagamento.index', compact('pagamentos', 'pedidos','clientes'));
    }
    public function store(Request $req){
        try {
            if($req->hasFile('comprovativo') && $req->file('comprovativo')->isValid()){
                $req_imagem=$req->comprovativo;
                $extension=$req_imagem->extension();
                $imagem_name=md5($req_imagem->getClientOriginalName() . strtotime('now')) . "." . $extension;
                $destino=$req_imagem->move(public_path("imagens/comprovativos"), $imagem_name);
                $dir = "imagens/comprovativos";
                $caminho=$dir. "/". $imagem_name;
                Pagamento::create([
                    'user_id' => $req->user_id,
                    'pedido_id'=> $req->pedido_id,
                    'comprovativo'=> $caminho,
                    'estado' => '0',
                ]);
             
              
                return redirect()->back()->with('status', 1);
            }else{
                return redirect()->back()->with('status_f', 1);
            }
        
        } catch (\Throwable $th) {
            //throw $th;
            dd($th);
            return redirect()->back()->with('status_f', 1);
      }  
   
    }
    public function update(){

    }
    public function delete(){

    }
    public function show(Pagamento $pagamento){
        return view('admin.pagamento.show', compact('pagamento'));
    }

    public function recusar(Pagamento $pagamento){
        try {
            //code...
            $pagamento->update([
                'estado'=>2
            ]);
               // Notificacao
               $user=User::where('id',$pagamento->user_id)->first();
               // 'name',
           // 'sobrename',
               Notificacao::create([
                   'user_id' => $req->user_id,
                   'titulo'=> "Pagamento",
                   'conteudo'=> "$user->name $user->sobrename o teu pagamento foi recusado"
                ]);
            //Pedidos::where('id', $pagamento->pedido_id)
            //->update([
            //    'estado'=> 2
            //]);
            return redirect()->back()->with('recusar', 1);
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('recusar_f', 1);
        }
       
    }
    public function gerarFactura(Pagamento $pagamento){
       $data['pagamentos'] = $pagamento->join('pedidos','pagamentos.pedido_id','pedidos.id')
        ->leftjoin('users','pedidos.prestador_id','users.id')
        ->leftjoin('pedidoservico','pedidoservico.pedidos_id','pedidos.id')
        ->leftjoin('sub_categorias','pedidos.id_servico_categoria','sub_categorias.id')
        ->select('pagamentos.*','users.name as prestador','sub_categorias.vc_nome as servico', 'pedidoservico.preco  as preco')
        ->get();
        $mpdf = new \Mpdf\Mpdf([
            'mode' => 'utf-8',
            'format' => 'A4',
            'margin_left' => 15,
            'margin_right' => 15,
            'margin_top' => 16,
            'margin_bottom' => 16,
            'margin_header' => 9,
            'margin_footer' => 9,
        ]);


        $mpdf->SetFont("arial");
        $mpdf->setHeader();
        $html = view("pdf.factura")->render();

        // Inclua o CSS personalizado
      
        $cssPaths = [
            public_path('factura_css/bootstrap.css'),
            public_path('factura_icons/bootstrap-icons.css'),
            public_path('factura_css/invoice.css'),
        ];
        $allCss = '';
        foreach ($cssPaths as $cssPath) {
            $allCss .= file_get_contents($cssPath);
        }
        
        $mpdf->WriteHTML($allCss, 1); // 1 para incluir os estilos inline
        $mpdf->WriteHTML($html);

        
        // Saída do PDF
        $mpdf->Output('factura.pdf', 'I');
        
    }
    public function aceitar(Pagamento $data){
        try {
            //code...
            $pagamento->update([
                'estado'=>1
            ]);
            $user=User::where('id',$pagamento->user_id)->first();
            // 'name',
        // 'sobrename',
            Notificacao::create([
                'user_id' => $req->user_id,
                'titulo'=> "Pagamento",
                'conteudo'=> "$user->name $user->sobrename o teu pagamento foi aceite"
            ]);
            //Pedidos::where('id', $pagamento->pedido_id)
            //->update([
            //    'estado'=> 1
            //]);
            return redirect()->back()->with('aceitar', 1);
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('aceitar_f', 1);
        }
    }
}
