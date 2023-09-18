<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tipolembretes;

class TipolembreteContoller extends Controller
{
    //
    public function index(){
        $tipolembretes=Tipolembretes::all();

        return view('admin.tipolembrete.index', compact('tipolembretes'));
    }

    public function store(Request $request){

        try{
            Tipolembretes::create([
                'nome'=>$request->nome,
            ]);
            return redirect()->back()->with('status',1);
        }catch (\Throwable $th) {
            return dd($th);
        }
    }

    public function update($id, Request $request){

        try{
            Tipolembretes::where('id',$id)->update([
                'nome'=>$request->nome
            ]);
            return redirect()->back()->with('editada',1);
        }catch (\Throwable $th) {
            return redirect()->back()->with("editada_f", '1');
        }

    }

    public function delete($id){
        try{
            Tipolembretes::destroy($id);
            return redirect()->back()->with('eliminada',1);
        }catch (\Throwable $th) {
            return redirect()->back()->with("eliminada_f", '1');
        }
      
    }
}
