<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class PerfilController extends Controller
{
    //
    public function index(){
        $id=Auth::user()->id;

        $dados['user']=User::where('id',$id)->first();

        return view('',$dados);
    }
    public function update(){
        $id=Auth::user()->id;
        $user=User::where('id',$id)->first(); 
    }
}
