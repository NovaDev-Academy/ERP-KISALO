<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagamentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pagamentos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->references('id')->on('users')
            ->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->unsignedBigInteger('pedido_id')->references('id')->on('pedidos')
            ->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->string('comprovativo');
            $table->enum('estado', ['1' , '0', '2'])->nullable();
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
        Schema::dropIfExists('pagamentos');
    }
}
