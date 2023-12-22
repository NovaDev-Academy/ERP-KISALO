<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\categoria;
use App\Models\provincia;
use App\Models\cores;
use App\Models\Pagamento;
use App\Models\Pedidos;
use App\Http\Controllers\Admin\ChartController;
class HomeController extends Controller
{
    //
    public function index(){
        $chartController= new ChartController;
        $data['chart_03']=$chartController->chart_03();
        $data['chart_08']=$chartController->chart_08();
     
        return view('admin.dashboard.index', $data);
    }

    

}