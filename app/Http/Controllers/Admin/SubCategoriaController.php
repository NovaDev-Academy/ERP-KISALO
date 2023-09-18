<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\sub_categoria;
use App\Models\categoria;
class SubCategoriaController extends Controller
{
    public function index(){
        $sub_categorias=sub_categoria::get();
   
        return view('admin.sub_categoria.index', compact('sub_categorias'));
    }

    public function store(Request $req){
        try{
        sub_categoria::create([
            'vc_nome'=>$req->vc_nome,
     
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
