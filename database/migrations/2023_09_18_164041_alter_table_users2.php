<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableUsers2 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('nome_empresa')->nullable();
            $table->string('reponsavel')->nullable();
            $table->string('descricao')->nullable();
            $table->string('bi')->nullable();
            $table->string('nif')->nullable();
            $table->string('documento')->nullable();
            $table->integer('estado')->default(0);
            $table->date('registro')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
