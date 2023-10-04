<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Validator;
class UserController extends Controller
{
    /** Nivel de Acesso
         * 0-Cliente
         * 1-Administrador
         * 2-Motorista
         * 3-Afiliado
         */
    public function ola(){
        dd('ola');
    }
    public function index(){
        $users=User::get();
     

        return view('admin.user.index', compact('users'));
    }

    public function store(Request $data){
        try{
            if($data['tipo_estabelecimento']==2){
       $imagem2 = $data['cv_path'];
        $req_imagem2=$imagem2;
        $extension2=$req_imagem2->extension();
        $imagem_name2=md5($req_imagem2->getClientOriginalName() . strtotime('now')) . "." . $extension2;
        $destino=$req_imagem2->move(public_path("documentos2/curriculos"), $imagem_name2);
        $dir2 = "documentos2/curriculos";
        $caminho2=$dir2. "/". $imagem_name2;

        $user = User::create([
            'name' => $data['name'],
            'sobrename' => $data['sobrename'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'telefone' => $data['phone'],
            'endereco' => $data['endereco'],
            'contacto' => $data['phone'],
            'vc_tipo_utilizador' => $data['tipo_estabelecimento'],
            // 'nome_empresa' => $data['nome_empresa'],
            // 'reponsavel' => $data['reponsavel'],
            'cv' =>$caminho2,
            'bi' => $data['bi'],
        ]);
            }
            elseif($data['tipo_estabelecimento']==1){
           
              
                    $imagem = $data['vc_path'];
                    $req_imagem=$imagem;
                    $extension=$req_imagem->extension();
                    $imagem_name=md5($req_imagem->getClientOriginalName() . strtotime('now')) . "." . $extension;
                    $destino=$req_imagem->move(public_path("documentos/prestadores"), $imagem_name);
                    $dir = "documentos/prestadores";
                    $caminho=$dir. "/". $imagem_name;
        
                $user=User::create([
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
        
            event(new Registered($user));
           
            // Auth::login($user);

            return redirect()->back()->with('status',1);
    }catch (\Throwable $th) {
        dd($th);
        return redirect()->back()->with("status_f", '1');
    }
    }
    public function update($id, Request $req){
        try{
       dd('ola');
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
        dd('ola');
        return redirect()->back()->with("editada_f", '1');
    }
    }
    public function delete($id){
        try{

     
        User::destroy($id);
        return redirect()->back()->with('eliminada',1);
    }catch (\Throwable $th) {
        return redirect()->back()->with("eliminada_f", '1');
    }
    }

    public function form(){
        return view('admin.user.indexf');
}

}
