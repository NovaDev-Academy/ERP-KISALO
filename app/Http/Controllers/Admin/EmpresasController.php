<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\empresa;
class EmpresasController extends Controller
{
    public function index(){
        $empresas=empresa::get();

        return view('admin.empresa.index', compact('empresas'));
    }

    public function store(Request $req){
        try{
        empresa::create([
            'iban'=>$req->iban,
            'sobre'=>$req->sobre,
            'contactos'=>$req->contactos,
        ]);
        return redirect()->back()->with('status',1);
    }catch (\Throwable $th) {
        return redirect()->back()->with("status_f", '1');
    }
    }
    public function update($id, Request $req){
        try{
        empresa::where('id',$id)->update([
            'iban'=>$req->iban,
            'sobre'=>$req->sobre,
            'contactos'=>$req->contactos,
        ]);
        return redirect()->back()->with('editada',1);

    } catch (\Throwable $th) {
        return redirect()->back()->with("editada_f", '1');
    }
    }
    public function delete($id){
        try{
        empresa::destroy($id);
        return redirect()->back()->with('eliminada',1);
    }catch (\Throwable $th) {
        return redirect()->back()->with("eliminada_f", '1');
    }
    }
}
