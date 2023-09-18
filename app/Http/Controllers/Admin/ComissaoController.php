<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\comissao;

class ComissaoController extends Controller

    {
        public function index(){
            $comissoes=comissao::get();
    
            return view('admin.comissao.index', compact('comissoes'));
        }
    
        public function store(Request $req){
            try{
            comissao::create([
                'valor'=>$req->valor,
    
            ]);
            return redirect()->back()->with('status',1);
        }catch (\Throwable $th) {
            return dd($th);
        }
        }
        public function update($id, Request $req){
            try{
    
            comissao::where('id',$id)->update([
                'valor'=>$req->valor,
            ]);
            return redirect()->back()->with('editada',1);
    
        } catch (\Throwable $th) {
            return redirect()->back()->with("editada_f", '1');
        }
        }
        public function delete($id){
            try{
            comissao::destroy($id);
            return redirect()->back()->with('eliminada',1);
        }catch (\Throwable $th) {
            return redirect()->back()->with("eliminada_f", '1');
        }
        }
    }

