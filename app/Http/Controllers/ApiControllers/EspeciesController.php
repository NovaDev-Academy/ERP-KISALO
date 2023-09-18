<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Especies;

class EspeciesController extends Controller
{
    //
    public function index(){
        $especies=Especies::all();
        return view('admin.especies.index', compact('especies'));
    }

    public function store(Request $request){

        try{
            Especies::create([
                'nome'=>$request->nome,
            ]);
            return redirect()->back()->with('status',1);
        }catch (\Throwable $th) {
            return dd($th);
        }
 }

    public function update($id, Request $request){

        try{
          
        Especies::where('id',$id)->update([
            'nome'=>$request->nome
        ]);
            return redirect()->back()->with('editada',1);
        }catch (\Throwable $th) {
            return redirect()->back()->with("editada_f", '1');
        }

    }

    public function delete($id){
       
        try{
          
            Especies::destroy($id);

                return redirect()->back()->with('eliminada',1);
            }catch (\Throwable $th) {
                return redirect()->back()->with("eliminada_f", '1');
            }
    }

    public function list(){


        return view('admin.especies.list');
    }

    
}



