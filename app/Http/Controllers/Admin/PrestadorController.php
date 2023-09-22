<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
class PrestadorController extends Controller
{
    //
    public function individual(){
        $users=User::where('vc_tipo_utilizador',2)->get();
     
        return view('admin.prestadores.individual', compact('users'));
    }
    public function empresa(){
        $users=User::where('vc_tipo_utilizador',3)->get();
        return view('admin.prestadores.empresa', compact('users'));
    }
    public function activar($id){
        try {
            User::where('id',$id)->update([
                'estado'=>1
            ]);
            return redirect()->back()->with('status',1);
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('status_error',1);
        }
    }
    public function desativar($id){
        try {
            User::where('id',$id)->update([
                'estado'=>0
            ]);
            return redirect()->back()->with('eliminada',1);
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('eliminada_error',1);
        }
    }


    
}
