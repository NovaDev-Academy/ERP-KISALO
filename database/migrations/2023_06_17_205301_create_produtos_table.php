<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdutosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    /*
    
        descricao
        preco
        id_categoria_produto
        id_estabelecimento
        quantidade
        fornecedor
        created_at
        expericao_at
    */
    public function up()
    {
        Schema::create('produtos', function (Blueprint $table) {
            $table->id();
            $table->string('vc_nome');
            $table->string('fornecedor');
            $table->float('fl_preco');
            // $table->unsignedBigInteger('id_estabelecimento')->references('id')
            // ->on('armazens')->onDelete('CASCADE');
            $table->unsignedBigInteger('id_categoria_produto')->references('id')
            ->on('cors')->onDelete('CASCADE')
            ->onUpdate('CASCADE')->nullable();
            $table->longText('lt_desc');
            // $table->longText('vc_path');
            $table->date('expericao_at');
            $table->integer('it_quantidade');
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
        Schema::dropIfExists('produtos');
    }
}
