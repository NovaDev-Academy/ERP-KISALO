<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLembretesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lembretes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_users')->references('id')->on('users')->onUpdate('cascade');
            $table->unsignedBigInteger('id_tipo_lembrete')->references('id')->on('tipolembretes')->onUpdate('cascade');
            $table->integer('frequencia');
            $table->longText('descricao');
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
        Schema::dropIfExists('lembretes');
    }
}
