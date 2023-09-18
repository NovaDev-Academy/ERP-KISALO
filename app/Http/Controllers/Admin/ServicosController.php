<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\servicos;
use App\Models\sub_categoria;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
class ServicosController extends Controller
{
    //
    public function index(){
        $dados['servicos']=servicos::join('armazens','servicos.armazens_id','armazens.id')
        // ->leftjoin('sub_categorias','servicos.id_tamanho','sub_categorias.id')
        ->leftjoin('sub_categorias','servicos.id_servico_categoria','sub_categorias.id')
        ->select('armazens.vc_nome as estabelecimento','servicos.*','sub_categorias.vc_nome as categoria_servico')
        ->get();
        // dd($dados);
        // $dados['categorias']=categoria::get();
        // $dados['tamanhos']=sub_categoria::get();
        $dados['categoria_servicos']=sub_categoria::get();


        return view('admin.servico.index', $dados);
    }

    public function store(Request $req){
        try{
        $id_armazem=Auth::user()->armazem[0]->id;
        // dd($req);
        $servico=servicos::create([
             'vc_nome'=>$req->vc_nome,
             'preco'=>$req->fl_preco,
             'armazens_id'=>$id_armazem,
             'id_servico_categoria'=>$req->id_servico_categoria,
             'lt_desc'=>$req->lt_desc,

            
        ]);

          // Recupere as imagens enviadas pelo formulário
   
    
       
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
            servicos::where('id',$id)->update([
                'vc_nome'=>$req->vc_nome,
                'preco'=>$req->fl_preco,
                'armazens_id'=>$id_armazem,
                'id_servico_categoria'=>$req->id_servico_categoria,
                'lt_desc'=>$req->lt_desc,
        ]);
        return redirect()->back()->with('editada',1);

    } catch (\Throwable $th) {
        return redirect()->back()->with("editada_f", '1');
    }
    }
    public function delete($id){
        try{
            servicos::destroy($id);
        return redirect()->back()->with('eliminada',1);
    }catch (\Throwable $th) {
        return redirect()->back()->with("eliminada_f", '1');
    }
    }
}

