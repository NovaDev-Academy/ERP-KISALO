<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnimalpetTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('animalpet', function (Blueprint $table) {
            $table->id();
            $table->String('nome');
            $table->enum('genero', ['m','f']);
            $table->float('peso');
            $table->date('data_nascimento');
            $table->unsignedBigInteger('id_especie')->references('id')->on('especies')->onUpdate('cascade');
            $table->unsignedBigInteger('id_racas')->references('id')->on('racas')->onUpdate('cascade');
            $table->unsignedBigInteger('id_estabelecimento')->references('id')->on('armazens')->onUpdate('cascade');
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
        Schema::dropIfExists('animalpet');
    }
}
