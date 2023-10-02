<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePedidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedidos', function (Blueprint $table) {
            $table->id();
            $table->date('data');
            $table->longText('descricao');
            $table->longText('localizacao');
            $table->unsignedBigInteger('users_id')->references('id')->on('users')
            ->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->unsignedBigInteger('id_servico_categoria')->references('id')->on('sub_categorias')
            ->onDelete('CASCADE')->onUpdate('CASCADE');
           
            $table->integer('estado')->default(0);
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
        Schema::dropIfExists('pedidos');
    }
}
