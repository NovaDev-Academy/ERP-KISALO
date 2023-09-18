<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\provincias;
class ProvinciaController extends Controller
{
    public function index(){
        $provincias=provincias::get();

        return view('admin.provincia.index', compact('provincias'));
    }

    public function store(Request $req){
        try{
        provincias::create([
            'vc_nome'=>$req->vc_nome,

        ]);
        return redirect()->back()->with('status',1);
    }catch (\Throwable $th) {
        return dd($th);
    }
    }
    public function update($id, Request $req){
        try{

        provincias::where('id',$id)->update([
            'vc_nome'=>$req->vc_nome,
        ]);
        return redirect()->back()->with('editada',1);

    } catch (\Throwable $th) {
        return redirect()->back()->with("editada_f", '1');
    }
    }
    public function delete($id){
        try{
        provincias::destroy($id);
        return redirect()->back()->with('eliminada',1);
    }catch (\Throwable $th) {
        return redirect()->back()->with("eliminada_f", '1');
    }
    }
}
