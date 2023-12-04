<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

     /*
   2.2 nome
	2.3 descrição
	2.4 id_sub_categoria
	2.5 id_categoria
	2.5 tempo_extimado_de_execução
      */


    public function up()
    {
        Schema::create('servicos', function (Blueprint $table) {
            $table->id();
            // $table->string('vc_nome');
            // $table->longText('descricao');
            $table->unsignedBigInteger('users_id')->references('id')
            ->on('users')->onDelete('CASCADE')
            ->onUpdate('CASCADE')->nullable();
            $table->unsignedBigInteger('id_servico_categoria')->references('id')->on('sub_categorias')
            ->onDelete('CASCADE')->onUpdate('CASCADE');
            // $table->longText('lt_desc');
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
        Schema::dropIfExists('servicos');
    }
}
