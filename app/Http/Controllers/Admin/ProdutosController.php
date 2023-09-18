<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Produto;
use App\Models\categoria;
use App\Models\sub_categoria;
use App\Models\Imagens;
use App\Models\Cor;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
class ProdutosController extends Controller
{
    //
    public function index(){
        $dados['produtos']=Produto::join('armazens','produtos.armazens_id','armazens.id')
        // ->leftjoin('sub_categorias','produtos.id_tamanho','sub_categorias.id')
        ->leftjoin('cors','produtos.id_categoria_produto','cors.id')
        ->select('armazens.vc_nome as estabelecimento','produtos.*','cors.vc_nome as categoria_produto')
        ->get();
        // dd($dados);
        // $dados['categorias']=categoria::get();
        // $dados['tamanhos']=sub_categoria::get();
        $dados['categoria_produtos']=Cor::get();


        return view('admin.produto.index', $dados);
    }

    public function store(Request $req){
        try{
        $id_armazem=Auth::user()->armazem[0]->id;
        // dd($req);
        $produto=Produto::create([
             'vc_nome'=>$req->vc_nome,
            'fl_preco'=>$req->fl_preco,
            'lt_desc'=>$req->lt_desc,
            'it_quantidade'=>$req->it_quantidade,
            'fornecedor'=>$req->fornecedor,
            'fl_preco'=>$req->fl_preco,
            'armazens_id'=>$id_armazem,
            'id_categoria_produto'=>$req->id_categoria_produto,
            // 'vc_path'=>$req->vc_path,
            'expericao_at'=>$req->expiracao_at,
        ]);

          // Recupere as imagens enviadas pelo formulário
   
    
          $imagens = $req->file('imagens');

    // Itere sobre cada imagem e faça o upload e o armazenamento
    foreach ($imagens as $imagem) {
        // Gere um nome único para a imagem
        // $nomeImagem = $imagem->getClientOriginalName();

        // // Mova a imagem para o diretório de armazenamento desejado
        // $imagem->move(public_path('imagens'), $nomeImagem);

        

        $req_imagem=$imagem;
        $extension=$req_imagem->extension();
        $imagem_name=md5($req_imagem->getClientOriginalName() . strtotime('now')) . "." . $extension;
        $destino=$req_imagem->move(public_path("imagens/produtos"), $imagem_name);
        $dir = "imagens/produtos";
        $caminho=$dir. "/". $imagem_name;

        // Crie um novo objeto de imagem e salve no banco de dados
        Imagens::create([
            'id_produto' => $produto->id,
            'vc_path' => $caminho,
        ]);
    }
        return redirect()->back()->with('status',1);
    }catch (\Throwable $th) {
        dd($th);
        return redirect()->back()->with("status_f", '1');
    }
    }
    public function update($id, Request $req){
        try{
            // dd($req);
            $id_armazem=Auth::user()->armazem[0]->id;
        Produto::where('id',$id)->update([
            'vc_nome'=>$req->vc_nome,
            'fl_preco'=>$req->fl_preco,
            'lt_desc'=>$req->lt_desc,
            'it_quantidade'=>$req->it_quantidade,
            'fornecedor'=>$req->fornecedor,
            'fl_preco'=>$req->fl_preco,
            'armazens_id'=>$id_armazem,
            'id_categoria_produto'=>$req->id_categoria_produto,
            // 'vc_path'=>$req->vc_path,
            'expericao_at'=>$req->expiracao_at,
        ]);
        return redirect()->back()->with('editada',1);

    } catch (\Throwable $th) {
        return redirect()->back()->with("editada_f", '1');
    }
    }
    public function delete($id){
        try{
        Produto::destroy($id);
        return redirect()->back()->with('eliminada',1);
    }catch (\Throwable $th) {
        return redirect()->back()->with("eliminada_f", '1');
    }
    }
}

