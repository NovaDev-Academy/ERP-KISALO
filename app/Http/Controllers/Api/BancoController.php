<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banco;

class BancoController extends Controller
{
    //
    public function index(){
        try {
            //code...
            $bancos = Banco::orderBy('id', 'desc')->get();
            return response()->json([
                'data'=>$bancos,
            ]);
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json([
                'data' => 'Erro ao pegar bancos',
            ],500);
        }  
    }  
}
