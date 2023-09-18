<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Lembretes;
use App\Models\User;
use App\Models\Tipolembretes;

class LembretesController extends Controller
{
    //
    public function index(){
        $tipolembretes = Tipolembretes::all();
        $users = User::all();

        $lembretes=Lembretes::join('users','users.id', 'lembretes.id_users')
        ->join('tipolembretes', 'tipolembretes.id', 'lembretes.id_tipo_lembrete')
        ->select('lembretes.*', 'users.name as name', 'tipolembretes.nome as nome_tipo_lembrete', )
        ->orderBy('id')->get();

        return view('admin.lembretes.index', compact('lembretes','users','tipolembretes'));
    }

    public function store(Request $request){

        try{
            Lembretes::create([
                'id_users'=>$request->users,
                'id_tipo_lembrete'=>$request->tipolembrete,
                'frequencia'=>$request->frequencia,
                'descricao'=>$request->descricao,
            ]);
            return redirect()->back()->with('status',1);
        }catch (\Throwable $th) {
            return dd($th);
        }
    }

    public function update($id, Request $request){

        try{
            Lembretes::where('id',$id)->update([
                'id_users'=>$request->users,
                'id_tipo_lembrete'=>$request->tipolembrete,
                'frequencia'=>$request->frequente,
                'descricao'=>$request->descricao,
            ]);
            return redirect()->back()->with('editada',1);
        }catch (\Throwable $th) {
            return redirect()->back()->with("editada_f", '1');
        }

    }

    public function delete($id){
        try{
            Lembretes::destroy($id);
            return redirect()->back()->with('eliminada',1);
        }catch (\Throwable $th) {
            return redirect()->back()->with("eliminada_f", '1');
        }
      
    }

    public function list(){


        return view('admin.racas.list');
    }

}
