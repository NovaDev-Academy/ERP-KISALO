<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Animais;
use App\Models\Especies;
use App\Models\Racas;
use App\Models\User;

class AnimaisController extends Controller
{
    //
    public function index(){
        $especies= Especies::all();
        $racas = Racas::all();
        $users = User::all();

        $animais=Animais::join('especies','especies.id', 'animais.id_especie')
        ->join('racas', 'racas.id', 'animais.id_racas')
        ->join('users', 'users.id', 'animais.id_users')
        ->select('animais.*', 'especies.nome as nome_esp', 'racas.nome as nome_raca', 'users.name as name')
        ->orderBy('id')->get();

        return view('admin.animais.index', compact('animais','especies', 'users','racas'));
    }

    public function store(Request $request){

        try{
           
            Animais::create([
                'nome'=>$request->nome,
                'genero'=>$request->genero,
                'peso'=>$request->peso,
                'id_especie'=>$request->especies,
                'id_racas' => $request->racas,
                'id_users'=>$request->users,
                'data_nascimento'=>$request->data_nascimento,
                
            ]);
            return redirect()->back()->with('status',1);
        }catch (\Throwable $th) {
            return dd($th);
        }
    }

    public function update($id, Request $request){

        try{
            Animais::where('id',$id)->update([
                'nome'=>$request->nome,
                'genero'=>$request->genero,
                'peso'=>$request->peso,
                'id_especie'=>$request->especies,
                'id_racas'=>$request->raca,
                'id_users'=>$request->users,
                'data_nascimento'=>$request->data_nascimento,
            ]);
            return redirect()->back()->with('editada',1);
        }catch (\Throwable $th) {
            return redirect()->back()->with("editada_f", '1');
        }

    }

    public function delete($id){
        try{
            Animais::destroy($id);
            return redirect()->back()->with('eliminada',1);
        }catch (\Throwable $th) {
            return redirect()->back()->with("eliminada_f", '1');
        }
      
    }

    public function list(){


        return view('admin.racas.list');
    }

}
