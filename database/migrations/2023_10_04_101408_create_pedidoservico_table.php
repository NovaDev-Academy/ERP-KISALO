<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePedidoservicoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedidoservico', function (Blueprint $table) {
            $table->id();
            $table->enum('estado', ['1' , '0', '2'])->nullable();
            $table->unsignedBigInteger('users_id')->references('id')->on('users')
            ->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->unsignedBigInteger('pedidos_id')->references('id')->on('pedidos')
            ->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->double('preco')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pedidoservico');
    }
}
