<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\carros;
use App\Models\User;
use App\Models\categoria;
use App\Models\provincia;
use App\Models\cores;

class HomeController extends Controller
{
    //
    public function index(){
        
        return view('admin.dashboard.index');
    }

}