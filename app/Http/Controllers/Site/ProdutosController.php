<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProdutosController extends Controller
{
    //
    public function index(){
        return view('site.produtos.index');
    }
    public function show(){
        return view('site.produtos.detalhe');
    }


}
