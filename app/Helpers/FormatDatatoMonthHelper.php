<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Storage;

class FormatDatatoMonthHelper
{
    public function formatDatatoMonth($chart){
        $meses = [
            'Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun',
            'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'
        ];
        $chart->transform(function ($item) use ($meses) {
          $item->mes_nome = $meses[$item->mes_numero - 1];
          return $item;
          });
        return $chart;
    }
}
