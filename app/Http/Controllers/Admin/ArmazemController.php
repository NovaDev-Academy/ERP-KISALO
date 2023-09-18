<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\armazens;
use App\Models\categoria;
use Illuminate\Support\Facades\Auth;
class ArmazemController extends Controller
{

        //
        public function index(){
            // dd(Auth::user()->armazem[0]->id);
            $dados['armazems']=armazens::join('users','armazens.id_user','users.id')
            ->join('categorias','armazens.id_categoria','categorias.id')
            // ->join('provincias','categoria.provincias_id','provincias.id')
            ->select('armazens.*','users.name as user','categorias.vc_nome as categoria')
            ->get();
            $dados['categorias']=categoria::get();
            return view('admin.armazem.index', $dados);
        }

        public function create(){
            $dados['categorias']=categoria::get();
            // dd($dados['categoria']);
            // $dados['provincias']=provincias::get();
            return view('admin.armazem.create', $dados);
        }

        public function store(Request $req){
            try{
                // dd($req);
                $id_user=Auth::user()->id;
                if($req->hasFile('vc_path') && $req->file('vc_path')->isValid()){
                $imagem = $req->file('vc_path');
                $req_imagem=$imagem;
                $extension=$req_imagem->extension();
                $imagem_name=md5($req_imagem->getClientOriginalName() . strtotime('now')) . "." . $extension;
                $destino=$req_imagem->move(public_path("imagens/armazens"), $imagem_name);
                $dir = "imagens/armazens";
                $caminho=$dir. "/". $imagem_name;
                $armazens=armazens::create([
                    'vc_nome'=>$req->vc_nome,
                    'contacto'=>$req->contacto,
                    'inicio'=>$req->inicio,
                    'fim'=>$req->fim,
                    'endereco'=>$req->endereco,
                    'id_categoria'=>$req->categoria,
                    'vc_path'=>$caminho,
                    'id_user'=>$id_user,
                 
                ]);

            return redirect()->back()->with('status',1);
                }
        }catch (\Throwable $th) {
            dd($th);
            return redirect()->back()->with("status_f", '1');
        }
        }
        public function update($id, Request $req){
            try{
                $id_user=Auth::user()->id;
                // dd($req);
            armazens::where('id',$id)->update([
                'vc_nome'=>$req->vc_nome,
                'contacto'=>$req->contacto,
                // 'horario_funcionamento'=>$req->horario_funcionamento,
                'id_categoria'=>$req->categoria,
                // 'vc_path'=>$caminho,
                'endereco'=>$req->endereco,
                'inicio'=>$req->inicio,
                'fim'=>$req->fim,
                'id_user'=>$id_user,
            ]);
            return redirect()->back()->with('editada',1);

        } catch (\Throwable $th) {
            dd($th);
            return redirect()->back()->with("editada_f", '1');
        }
        }
        public function delete($id){
            try{
            armazens::destroy($id);
            return redirect()->back()->with('eliminada',1);
        }catch (\Throwable $th) {
            return redirect()->back()->with("eliminada_f", '1');
        }
        }

}
