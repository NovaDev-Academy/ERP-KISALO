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
use App\Helpers\FormatDatatoMonthHelper;
class ChartController extends Controller
{
    protected $helper;

    public function __construct()
    {
        $this->helper = new FormatDatatoMonthHelper();
    }
    public function chart_08(){
        $chart =   Pedidos::join('users', 'pedidos.users_id', 'users.id')
          ->join('sub_categorias', 'pedidos.id_servico_categoria', 'sub_categorias.id')
          ->whereNull('pedidos.prestador_id')
          ->select(
              \DB::raw('COUNT(pedidos.id) as quantidade_pedidos'),
              \DB::raw('MONTH(pedidos.created_at) as mes_numero')
          )
          ->groupBy('mes_numero')
          ->get();
            // Mapeando os nomes dos meses em português
            
          $chart= $this->helper->formatDatatoMonth($chart);

          return $chart;
      }
  
      public function chart_03(){
          $chart =   Pedidos::join('users', 'pedidos.users_id', 'users.id')
          ->join('sub_categorias', 'pedidos.id_servico_categoria', 'sub_categorias.id')
          ->whereNotNull('pedidos.prestador_id')
          ->where('pedidos.estado',0)
          ->select(
              \DB::raw('COUNT(pedidos.id) as quantidade_pedidos'),
              \DB::raw('MONTH(pedidos.created_at) as mes_numero')
          )
          ->groupBy('mes_numero')
          ->get();
      
          // Mapeando os nomes dos meses em português
          $chart= $this->helper->formatDatatoMonth($chart);
          return $chart;
      }

      public function chart_01(){
        $chart = Pedidos::join('users', 'pedidos.users_id', 'users.id')
        ->join('sub_categorias', 'pedidos.id_servico_categoria', 'sub_categorias.id')
        ->select( \DB::raw('MONTH(pedidos.created_at) as mes_numero'))
        ->groupBy('mes_numero')
        ->selectRaw('COUNT(DISTINCT users.id) as quantidade_usuarios')
        ->get();
       
        $chart= $this->helper->formatDatatoMonth($chart);
        
        return $chart;
      }

      
}
