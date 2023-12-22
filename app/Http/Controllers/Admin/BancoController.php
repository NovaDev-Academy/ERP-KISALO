<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banco;

class BancoController extends Controller
{
    //
    public function index(){
        $bancos = Banco::get();
        return view('admin.banco.index', compact('bancos'));
    }
    public function store(Request $req){
        try {
            //code...
            Banco::create([
                'name' => $req->name,
                'iban'=> $req->iban,
                'conta'=> $req->conta,
                'titular'=> $req->titular,
             ]);
            return redirect()->back()->with('status', 1);
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('status_f', 1);
        } 
    }
    public function update(Banco $banco){
        try {
            //code...
            $banco->update([
                'name' => $req->name,
                'iban'=> $req->iban,
                'conta'=> $req->conta,
                'titular'=> $req->titular,
             ]);
             return redirect()->back()->with('status', 1);
        } catch (\Throwable $th) {
            return redirect()->back()->with('status_f', 1);
            //throw $th;
        }
    }
    public function delete(Banco $banco){
        try {
            //code...
            $banco->softDelete();
            return redirect()->back()->with('status', 1);
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('status_f', 1);
        }
        
    }
}
