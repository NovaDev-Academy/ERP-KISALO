<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class AlterTablePedidosevico extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        //Schema::table('pedidoservico', function (Blueprint $table) {
           // $table->double('preco_novo')->nullable();
        //});
        
        //DB::statement('UPDATE pedidoservico SET preco_novo = CAST(preco AS DOUBLE)');
        
     
}

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
