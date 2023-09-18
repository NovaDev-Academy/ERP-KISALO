<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\sub_categoria;
use App\Models\categoria;
class SubCategoriaController extends Controller
{
    public function index(){
        $dados['sub_categorias']=sub_categoria::join('categorias','sub_categorias.id_categoria','categorias.id')
        // ->join('provincias','categoria.provincias_id','provincias.id')
        ->select('sub_categorias.*','categorias.vc_nome as categoria')
        ->get();
        $dados['categorias']=categoria::get();
        return view('admin.sub_categoria.index',$dados);
    }

    public function store(Request $req){
        try{
        sub_categoria::create([
            'vc_nome'=>$req->vc_nome,
            'id_categoria'=>$req->categoria,
        ]);
        return redirect()->back()->with('status',1);
    }catch (\Throwable $th) {
        return dd($th);
    }
    }
    public function update($id, Request $req){
        try{
         
            sub_categoria::where('id',$id)->update([
                'vc_nome'=>$req->vc_nome,
                'id_categoria'=>$req->categoria,
            ]);
        return redirect()->back()->with('editada',1);

    } catch (\Throwable $th) {
        return redirect()->back()->with("editada_f", '1');
    }
    }
    public function delete($id){
        try{
        sub_categoria::destroy($id);
        return redirect()->back()->with('eliminada',1);
    }catch (\Throwable $th) {
        return redirect()->back()->with("eliminada_f", '1');
    }
    }
}
