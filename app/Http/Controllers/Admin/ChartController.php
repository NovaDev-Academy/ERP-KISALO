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
use App\Helpers\pedidosTableHelper;
class ChartController extends Controller
{
    protected $helper;
    protected $pedidos_table;

    public function __construct()
    {
        $this->helper = new FormatDatatoMonthHelper();
        $this->pedidos_table = new pedidosTableHelper();
    }
    public function chart_03(){
       
        $chart = $this->pedidos_table->userServicos() ->whereNotNull('pedidos.prestador_id')
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
    public function chart_08(){
       
        $chart = $this->pedidos_table->userServicos()->whereNull('pedidos.prestador_id')
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
       
        $chart = $this->pedidos_table->userServicos()->select( \DB::raw('MONTH(pedidos.created_at) as mes_numero'))
        ->groupBy('mes_numero')
        ->selectRaw('COUNT(DISTINCT users.id) as quantidade_usuarios')
        ->get();
       
        $chart= $this->helper->formatDatatoMonth($chart);
        
        return $chart;
      }

      

      
}
