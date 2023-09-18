<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cor;
class CorController extends Controller
{
    public function index(){
        $cores=Cor::get();

        return view('admin.cor.index', compact('cores'));
    }

    public function store(Request $req){
        try{
        Cor::create([
            'vc_nome'=>$req->vc_nome,

        ]);
        return redirect()->back()->with('status',1);
    }catch (\Throwable $th) {
        return dd($th);
    }
    }
    public function update($id, Request $req){
        try{

        Cor::where('id',$id)->update([
            'vc_nome'=>$req->vc_nome,
        ]);
        return redirect()->back()->with('editada',1);

    } catch (\Throwable $th) {
        return redirect()->back()->with("editada_f", '1');
    }
    }
    public function delete($id){
        try{
        Cor::destroy($id);
        return redirect()->back()->with('eliminada',1);
    }catch (\Throwable $th) {
        return redirect()->back()->with("eliminada_f", '1');
    }
    }
}
