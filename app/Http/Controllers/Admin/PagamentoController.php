<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use App\Models\Notificacao;
use App\Models\Pagamento;
use App\Models\Pedidos;
use App\Models\User;


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
        $pdf = Pdf::loadView('pdf.factura', $data)->setPaper('a4');
        return $pdf->stream();
        
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
