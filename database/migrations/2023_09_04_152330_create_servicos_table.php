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
     id
	nome
	descricao
	preco
	id_estabelecimento
      */
    public function up()
    {
        Schema::create('servicos', function (Blueprint $table) {
            $table->id();
            $table->string('vc_nome');
            $table->double('preco');
            $table->unsignedBigInteger('armazens_id')->references('id')
            ->on('armazens')->onDelete('CASCADE')
            ->onUpdate('CASCADE')->nullable();
            $table->unsignedBigInteger('id_servico_categoria')->references('id')->on('sub_categorias')
            ->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->longText('lt_desc');
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
