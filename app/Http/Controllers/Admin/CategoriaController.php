<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\categoria;


class CategoriaController extends Controller
{
    //
    public function index(){
        $dados['categorias']=categoria::get();
        $dados['fdsf']="dfsf";

        return view('admin.categoria.index', $dados);
    }

    public function store(Request $req){
        try{
            
        categoria::create([
            'vc_nome'=>$req->nome,
          
        ]);
        return redirect()->back()->with('status',1);
    }catch (\Throwable $th) {
        return redirect()->back()->with("status_f", '1');
    }
    }
    public function update($id, Request $req){
        try{
        categoria::where('id',$id)->update([
            'vc_nome'=>$req->nome
        ]);
        return redirect()->back()->with('editada',1);

    } catch (\Throwable $th) {
        return redirect()->back()->with("editada_f", '1');
    }
    }
    public function delete($id){
        try{
        categoria::destroy($id);
        return redirect()->back()->with('eliminada',1);
    }catch (\Throwable $th) {
        return redirect()->back()->with("eliminada_f", '1');
    }
    }
}
