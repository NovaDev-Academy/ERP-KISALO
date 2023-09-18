<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComissaoEstabelecimentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    /*
    id_estabelecimento
	valor_tranzacao
	id_comissao
	estado */
    public function up()
    {
        Schema::create('comissao_estabelecimentos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('armazems_id')->references('id')->on('armazems')
            ->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->double('valor');
            $table->unsignedBigInteger('comissao_id')->references('id')->on('comissaos')
            ->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->integer('estado');
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
        Schema::dropIfExists('comissao_estabelecimentos');
    }
}
