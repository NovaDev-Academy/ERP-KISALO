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
    public function update(Request $data){
        try{
            // dd('ola');
                $id=Auth::user()->id;
                $acesso=Auth::user()->vc_tipo_utilizador;
                if($acesso==2){
                    if(isset($data['cv_path'])){

                        $imagem2 = $data['cv_path'];
                        $req_imagem2=$imagem2;
                        $extension2=$req_imagem2->extension();
                        $imagem_name2=md5($req_imagem2->getClientOriginalName() . strtotime('now')) . "." . $extension2;
                        $destino=$req_imagem2->move(public_path("documentos2/curriculos"), $imagem_name2);
                        $dir2 = "documentos2/curriculos";
                        $caminho2=$dir2. "/". $imagem_name2;
                        User::where('id',$id)->update([
                            'cv' =>$caminho2,
                        ]);
                    }
                  

                     if(isset($data['cv_path'])){
                        $imagem = $data['vc_path'];
                        $req_imagem=$imagem;
                        $extension=$req_imagem->extension();
                        $imagem_name=md5($req_imagem->getClientOriginalName() . strtotime('now')) . "." . $extension;
                        $destino=$req_imagem->move(public_path("documentos/prestadores"), $imagem_name);
                        $dir = "documentos/prestadores";
                        $caminho=$dir. "/". $imagem_name;
                        User::where('id',$id)->update([
                            'vc_path'=>$caminho,
                        ]);
                     }
             
                     $user = User::where('id',$id)->update([
                         'name' => $data['name'],
                         'sobrename' => $data['sobrename'],
                         'email' => $data['email'],
                         'password' => Hash::make($data['password']),
                         'telefone' => $data['phone'],
                         'endereco' => $data['endereco'],
                        //  'contacto' => $data['phone'],
                         'vc_tipo_utilizador' => $acesso,
                         // 'nome_empresa' => $data['nome_empresa'],
                         // 'reponsavel' => $data['reponsavel'],
                        
                         'bi' => $data['bi'],
                        //  'vc_path'=>$caminho,
                     ]);
                         }
                         elseif($acesso==3){
                        
                            if($data['cv_path']){

                                $imagem2 = $data['cv_path'];
                                $req_imagem2=$imagem2;
                                $extension2=$req_imagem2->extension();
                                $imagem_name2=md5($req_imagem2->getClientOriginalName() . strtotime('now')) . "." . $extension2;
                                $destino=$req_imagem2->move(public_path("documentos2/curriculos"), $imagem_name2);
                                $dir2 = "documentos2/curriculos";
                                $caminho2=$dir2. "/". $imagem_name2;
                                User::where('id',$id)->update([
                                    'cv' =>$caminho2,
                                ]);
                            }
                          
        
                             if($data['cv_path']){
                                $imagem = $data['vc_path'];
                                $req_imagem=$imagem;
                                $extension=$req_imagem->extension();
                                $imagem_name=md5($req_imagem->getClientOriginalName() . strtotime('now')) . "." . $extension;
                                $destino=$req_imagem->move(public_path("documentos/prestadores"), $imagem_name);
                                $dir = "documentos/prestadores";
                                $caminho=$dir. "/". $imagem_name;
                                User::where('id',$id)->update([
                                    'vc_path'=>$caminho,
                                ]);
                             }
                     
                                 $imagem = $data['vc_path'];
                                 $req_imagem=$imagem;
                                 $extension=$req_imagem->extension();
                                 $imagem_name=md5($req_imagem->getClientOriginalName() . strtotime('now')) . "." . $extension;
                                 $destino=$req_imagem->move(public_path("documentos/prestadores"), $imagem_name);
                                 $dir = "documentos/prestadores";
                                 $caminho=$dir. "/". $imagem_name;
                     
                                 $user = User::where('id',$id)->update([
                                 'name' => $data['name'],
                                 'sobrename' => $data['sobrename'],
                                 'email' => $data['email'],
                                 'password' => Hash::make($data['password']),
                                 'telefone'=> $data['phone'],
                                 'endereco'=> $data['endereco'],
                                 'contacto'=> $data['phone'],
                                 'vc_tipo_utilizador'=> 3,
                                 'nome_empresa'=> $data['nome_empresa'],
                                 'reponsavel'=> $data['reponsavel'],
                                 // 'descricao'=> $data['descricao'],
                                 'bi'=> $data['bi'],
                                 'nif'=> $data['nif'],
                                 'documento'=>   $caminho,
                                 'registro'=> $data['registro'],
                             ]);
                          
                             // 
                        
                         }
                         else{
                             return redirect()->back();
                         }
                        
                     
                         if (!$user) {
                             // Trate o erro aqui, se a criação do usuário falhar
                             // Por exemplo, você pode lançar uma exceção ou redirecionar com uma mensagem de erro
                             return redirect()->back()->withInput()->withErrors(['error' => 'Erro ao criar o usuário']);
                         }
                     
                         return redirect()->back()->with('status',1);
            
    } catch (\Throwable $th) {
        // dd($th);
        return redirect()->back()->with("editada_f", '1');
    }
    }
    // public function update( Request $req){
    //     try{
    //         // dd('ola');
    //             $id=Auth::user()->id;
    //         if($req->hasFile('vc_path') && $req->file('vc_path')->isValid()){
    //             // Imagem VC_PATH
    //             $req_imagem=$req->vc_path;
    //             $extension=$req_imagem->extension();
    //             $imagem_name=md5($req_imagem->getClientOriginalName() . strtotime('now')) . "." . $extension;
    //             $destino=$req_imagem->move(public_path("imagens/galeria"), $imagem_name);
    //             $dir = "imagens/galeria";
    //             $caminho=$dir. "/". $imagem_name;
    //             $user=User::where('id',$id)->update([
    //                 'name'=>$req->name,
    //                 'email'=>$req->email,
    //                 'password'=>Hash::make($req->password),
    //                 'vc_path'=>$caminho,
    //                 'vc_tipo_utilizador'=>$req->vc_tipo_utilizador,
    //                 'genero'=>$req->genero,
    //                 'endereco'=>$req->endereco,

    //             ]);
    //             return redirect()->back()->with('editada',1);
    //             }
                
            
    //             else{
    //                 User::where('id',$id)->update([
    //                     'name'=>$req->name,
    //                     'email'=>$req->email,
    //                     'password'=>Hash::make($req->password),
    //                     'vc_tipo_utilizador'=>$req->vc_tipo_utilizador,
    //                     'genero'=>$req->genero,
    //                     'endereco'=>$req->endereco,

    //                 ]);
    //                 return redirect()->back()->with('editada',1);
    //             }

            
    // } catch (\Throwable $th) {
    //     dd($th);
    //     return redirect()->back()->with("editada_f", '1');
    // }
    // }
}
