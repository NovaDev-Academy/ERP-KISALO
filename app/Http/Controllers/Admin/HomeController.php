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
        $data['chart-03']=$chartController->chart_03();
        $data['chart-08']=$chartController->chart_08();
        dd($data);
        return view('admin.dashboard.index', $data);
    }

    

}