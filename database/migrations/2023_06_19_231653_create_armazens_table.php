<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArmazensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * id
	 *id_usuario
	 *nome
	 *endereco
	 *contacto
	 *horario_funcionamento
	 *id_tipo_estabelecimento
     * 
     * @return void
     */
    public function up()
    {
        Schema::create('armazens', function (Blueprint $table) {
            $table->id();
            $table->string('vc_nome')->unique();
            // $table->string('nif')->unique();
            $table->longText('endereco')->nullable();
            $table->string('contacto')->nullable();
            $table->longText('vc_path')->nullable();
            $table->time('inicio')->nullable();
            $table->time('fim')->nullable();
            $table->unsignedBigInteger('id_categoria')->references('id')->on('categorias')
            ->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->unsignedBigInteger('id_user')->references('id')->on('users')
            ->onDelete('CASCADE')->onUpdate('CASCADE');
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
        Schema::dropIfExists('armazens');
    }
}
