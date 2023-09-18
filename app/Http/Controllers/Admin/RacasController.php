<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Racas;

class RacasController extends Controller
{
    //
    public function index(){

     
        $racas=Racas::all();

        return view('admin.racas.index', compact('racas'));
    }

    public function store(Request $request){

        try{
            Racas::create([
                'nome'=>$request->nome,
            ]);
            return redirect()->back()->with('status',1);
        }catch (\Throwable $th) {
            return dd($th);
        }
    }

    public function update($id, Request $request){

        try{
            Racas::where('id',$id)->update([
                'nome'=>$request->nome
            ]);
            return redirect()->back()->with('editada',1);
        }catch (\Throwable $th) {
            return redirect()->back()->with("editada_f", '1');
        }

    }

    public function delete($id){
        try{
            Racas::destroy($id);
            return redirect()->back()->with('eliminada',1);
        }catch (\Throwable $th) {
            return redirect()->back()->with("eliminada_f", '1');
        }

    }

    public function list(){


        return view('admin.racas.list');
    }

}
