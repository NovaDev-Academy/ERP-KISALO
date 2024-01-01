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
    public function analytics_chart_01_r(){
      $chart=User::where('vc_tipo_utilizador','!=',0)
      ->where('vc_tipo_utilizador','!=',1)
      ->where('vc_tipo_utilizador','!=',2)
      ->select( 
        \DB::raw('COUNT(users.id) as quantidade_users'),
      \DB::raw('MONTH(users.created_at) as mes_numero'))
      ->groupBy('mes_numero')
      ->get();
      $chart= $this->helper->formatDatatoMonth($chart);
      return $chart;
    }

    public function chart_03(){
    //  >Quantidade de utilizadores que solicitaram e <br>cancelaram os serviços
        $chart = $this->pedidos_table->userServicos() ->whereNotNull('pedidos.prestador_id')
          ->where('pedidos.estado',2)
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
        //  Quantidade de utilizadores que solicitaram os serviços
        $chart = $this->pedidos_table->userServicos()->select( \DB::raw('MONTH(pedidos.created_at) as mes_numero'))
        ->groupBy('mes_numero')
        ->selectRaw('COUNT(DISTINCT users.id) as quantidade_usuarios')
        ->get();
       
        $chart= $this->helper->formatDatatoMonth($chart);
        
        return $chart;
      }

      public function chart_06(){
        // Quantidade de prestadores que atenderam os pedidos
        $chart = $this->pedidos_table->userServicos()
        ->where('pedidos.estado',1)
        ->select( \DB::raw('MONTH(pedidos.created_at) as mes_numero'))
        ->groupBy('mes_numero')
        ->selectRaw('COUNT(DISTINCT pedidos.prestador_id) as quantidade_prestadores')
        ->get();

          // Mapeando os nomes dos meses em português
          $chart= $this->helper->formatDatatoMonth($chart);
        return $chart;
      }
      public function chart_05(){
        //  Quantidade de comentários por avaliações
        $chart = $this->pedidos_table->userServicos()
        ->whereNotNull('pedidos.estrelas')
        ->select('estrelas', \DB::raw('count(*) as quantidade_estrelas'))
        ->groupBy('estrelas')
        ->get();
       
        
        return $chart;
      }
      public function chart_04(){
        // Quantidade de serviços que se encontram pendentes de orçamentos
        $chart = $this->pedidos_table->userServicos()
        ->join('pagamentos','pagamentos.pedido_id', 'pedidos.id')
        ->where('pagamentos.estado',0)
        ->select( \DB::raw('MONTH(pagamentos.created_at) as mes_numero'))
        ->groupBy('mes_numero')
        ->selectRaw('COUNT(DISTINCT pagamentos.id) as quantidade_pagamentos')
        ->get();

          // Mapeando os nomes dos meses em português
          $chart= $this->helper->formatDatatoMonth($chart);
        return $chart;
      }

      public function analytics_chart_03(){
        //  Quantidade de serviços que se encontram pendentes para realização
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
      //  Quantidade de serviços abertos (sem prestadores alocadores)
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
  

    

      

      
}
