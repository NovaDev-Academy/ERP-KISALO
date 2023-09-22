<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
class PerfilController extends Controller
{
    //
    public function index(){
        $id=Auth::user()->id;

        $dados['user']=User::where('id',$id)->first();

        return view('admin.user.perfil',$dados);
    }
    public function update( Request $req){
        try{
            // dd('ola');
                $id=Auth::user()->id;
            if($req->hasFile('vc_path') && $req->file('vc_path')->isValid()){
                // Imagem VC_PATH
                $req_imagem=$req->vc_path;
                $extension=$req_imagem->extension();
                $imagem_name=md5($req_imagem->getClientOriginalName() . strtotime('now')) . "." . $extension;
                $destino=$req_imagem->move(public_path("imagens/galeria"), $imagem_name);
                $dir = "imagens/galeria";
                $caminho=$dir. "/". $imagem_name;
                $user=User::where('id',$id)->update([
                    'name'=>$req->name,
                    'email'=>$req->email,
                    'password'=>Hash::make($req->password),
                    'vc_path'=>$caminho,
                    'vc_tipo_utilizador'=>$req->vc_tipo_utilizador,
                    'genero'=>$req->genero,
                    'endereco'=>$req->endereco,

                ]);
                return redirect()->back()->with('editada',1);
                }
                
            
                else{
                    User::where('id',$id)->update([
                        'name'=>$req->name,
                        'email'=>$req->email,
                        'password'=>Hash::make($req->password),
                        'vc_tipo_utilizador'=>$req->vc_tipo_utilizador,
                        'genero'=>$req->genero,
                        'endereco'=>$req->endereco,

                    ]);
                    return redirect()->back()->with('editada',1);
                }

            
    } catch (\Throwable $th) {
        dd($th);
        return redirect()->back()->with("editada_f", '1');
    }
    }
}
