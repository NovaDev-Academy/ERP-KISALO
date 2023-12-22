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
class ChartController extends Controller
{
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
          $mesesEmPortugues=$this->meses();
  
          $chart->transform(function ($item) use ($mesesEmPortugues) {
              $item->mes_nome = $mesesEmPortugues[$item->mes_numero - 1];
              return $item;
          });
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
          $mesesEmPortugues=$this->meses();
  
          $chart->transform(function ($item) use ($mesesEmPortugues) {
              $item->mes_nome = $mesesEmPortugues[$item->mes_numero - 1];
              return $item;
          });
          return $chart;
      }
      public function meses(){
          $meses = [
              'Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun',
              'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'
          ];
          return $meses;
      }
}
