<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\pracas;
use App\Models\provincias;
class PracaController extends Controller
{
    //
    public function index(){
        $dados['pracas']=pracas::join('provincias','provincias_id','provincias.id')
        ->select('pracas.*','provincias.vc_nome as provincia')
        ->get();
        $dados['provincias']=provincias::get();

        return view('admin.praca.index', $dados);
    }

    public function store(Request $req){
        try{
// dd($req);
        pracas::create([
            'vc_nome'=>$req->vc_nome,
            'provincias_id'=>$req->id_provincia,
        ]);
        return redirect()->back()->with('status',1);

    }catch (\Throwable $th) {
        dd($th);
        return redirect()->back()->with("status_f", '1');
    }
    }
    public function update($id, Request $req){
        try{
            // dd($req);
        pracas::where('id',$id)->update([
            'vc_nome'=>$req->vc_nome,
            'provincias_id'=>$req->id_provincia,
        ]);
        return redirect()->back()->with('editada',1);

    } catch (\Throwable $th) {
        dd($th);
        return redirect()->back()->with("editada_f", '1');
    }
    }
    public function delete($id){
        try{
        pracas::destroy($id);
        return redirect()->back()->with('eliminada',1);
    }catch (\Throwable $th) {
        return redirect()->back()->with("eliminada_f", '1');
    }
    }
}
