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
        $data['chart_01']=$chartController->chart_01();
        $data['chart_04']=$chartController->chart_04();
        $data['chart_05']=$chartController->chart_05();
        $data['chart_06']=$chartController->chart_06();
        $data['analytics_chart_03']=$chartController->analytics_chart_03();
        $data['analytics_chart_01_r']=$chartController->analytics_chart_01_r();
    //     dd($data);
     
        return view('admin.dashboard.index', $data);
    }

    

}