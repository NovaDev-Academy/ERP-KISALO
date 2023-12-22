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
        if(Auth::user()->vc_tipo_utilizador==1){
        $dados['servicos']=servicos::join('users','servicos.users_id','users.id')
        // ->leftjoin('sub_categorias','servicos.id_tamanho','sub_categorias.id')
        ->leftjoin('sub_categorias','servicos.id_servico_categoria','sub_categorias.id')
        ->select('users.name as estabelecimento','servicos.*','sub_categorias.vc_nome as categoria_servico')
        ->get();
        $dados['prestadores'] = User::Where('vc_tipo_utilizador', 3)->orwhere('vc_tipo_utilizador', 2)->get();
       
        // dd($dados);
        // $dados['categorias']=categoria::get();
        // $dados['tamanhos']=sub_categoria::get();
     }
     else{
        $id=Auth::user()->id;
        $dados['servicos']=servicos::join('users','servicos.users_id','users.id')
        // ->leftjoin('sub_categorias','servicos.id_tamanho','sub_categorias.id')
        ->leftjoin('sub_categorias','servicos.id_servico_categoria','sub_categorias.id')
        ->where('servicos.users_id',$id)
        ->select('users.name as estabelecimento','servicos.*','sub_categorias.vc_nome as categoria_servico')
        ->get();
     }
         $dados['categoria_servicos']=sub_categoria::get();


        return view('admin.servico.index', $dados);
    }

    public function getSubcategoriaDescricao($id)
{
    $subCategoria = sub_categoria::where('id', $id)->first();

    if ($subCategoria) {
        return response()->json(['descricao' => $subCategoria->descricao]);
    }

    return response()->json(['descricao' => '']); // Retorna uma descrição vazia se não encontrar nenhuma correspondência.
}

    public function store(Request $req){
        try{
        // dd($req);
        $id_user= $req->id_user ?? Auth::user()->id;
        // dd($req);
        $servico=servicos::create([
            'min'=>$req->min,
            'max'=>$req->max,
            'vc_nome'=>$req->vc_nome,
            // 'preco'=>$req->fl_preco,
            'users_id'=>$id_user,
            'id_servico_categoria'=>$req->id_servico_categoria,
            'descricao'=>$req->lt_desc,

            
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
            $id_user = Auth::user()->id;
            servicos::where('id',$id)->update([
                'vc_nome'=>$req->vc_nome,
                // 'preco'=>$req->fl_preco,
                'users_id'=>$id_user,
                'id_servico_categoria'=>$req->id_servico_categoria,
                'descricao'=>$req->lt_desc,
                'min'>=$req->min,
                'max'>=$req->max,
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

    public function activar($id){
        try {
            servicos::where('id',$id)->update([
                'estado_admin'=>1
            ]);
            return redirect()->back()->with('activar',1);
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('activar_error',1);
        }
    }
    public function desativar($id){
        try {
            servicos::where('id',$id)->update([
                'estado_admin'=>2
            ]);
            return redirect()->back()->with('desativar',1);
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('desativar_error',1);
        }
    }

    public function activo($id){
        try {
            servicos::where('id',$id)->update([
                'estado_usuario'=>1
            ]);
            return redirect()->back()->with('activar',1);
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('activar_error',1);
        }
    }
    public function suspenso($id){
        try {
            servicos::where('id',$id)->update([
                'estado_usuario'=>0
            ]);
            return redirect()->back()->with('desativar',1);
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('desativar_error',1);
        }
    }
}

