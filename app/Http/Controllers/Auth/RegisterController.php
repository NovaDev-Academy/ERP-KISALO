<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\armazens;
use App\Models\categoria;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\Auth\Authenticatable;
class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
           
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */

     protected function create(array $data)
{
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
            'provincia'=> $data['provincia'],
            'municipio'=> $data['municipio'],
            'telefone_2'=> $data['telefone_2'],
            'kisalo'=> $data['kisalo'],
            'informações'=> $data['informações'],
            'funcionarios'=> $data['funcionarios'],
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
            'provincia'=> $data['provincia'],
            'municipio'=> $data['municipio'],
            'telefone_2'=> $data['telefone_2'],
            'kisalo'=> $data['kisalo'],
            'informações'=> $data['informações'],
            'funcionarios'=> $data['funcionarios'],
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
   
    Auth::login($user);

    return $user;
}
    // protected function create(array $data)
    // {
        // dd($data);

        // $validator = Validator::make($request->all(), [
        //     'name' => 'required|string|unique:users',
        //     'email' => 'required|email|unique:users',
        //     'contacto' => 'required|numeric|unique:users',
        //     'password' => 'required|min:6|confirmed',
        //     'vc_nome' => 'required|string|unique:armazens',
        //     'endereco' => 'required|string|unique:armazens',
        //     'id_categoria' => 'required',
        //     'inicio' => 'required',
        //     'fim' => 'required',
        // ], [
        //     'endereco.required'=>'O campo de Endereço de Biblioteca é obrigatorio',
        //     'endereco.string'=>'O campo de Endereço de Biblioteca deve ser uma string',
        //     'endereco.unique'=>'Já existe um Estabelecimento cadastrado com esse endereço',
        //     'name.required' => 'O campo nome é obrigatório.',
        //     'name.string' => 'O campo nome deve ser uma string.',
        //     'name.unique' => 'O nome de usuário já está em uso.',
        //     'email.required' => 'O campo e-mail é obrigatório.',
        //     'email.email' => 'O campo e-mail deve ser um endereço de e-mail válido.',
        //     'email.unique' => 'O e-mail já está em uso.',
        //     'contacto.required' => 'O campo telefone é obrigatório.',
        //     'contacto.numeric' => 'O campo telefone deve conter apenas números.',
        //     'contacto.unique' => 'O telefone já está em uso.',
            
        // ]);
    
        // if ($validator->fails()) {
        //     return redirect()->back()->withErrors($validator)->withInput();
        // }

//         dd($data);

// dd($user);
      
       
//         event(new Registered($user));

//         Auth::login($user);

//         return redirect(RouteServiceProvider::HOME);
//     }
}
