<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        /** Nivel de Acesso
         * 0-Cliente
         * 1-Administrador
         * 2-Motorista
         * 3-Afiliado
         * 4-Gerente
         */
        Schema::table('users', function (Blueprint $table) {
            $table->integer('vc_tipo_utilizador')->default(0);
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
