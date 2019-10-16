<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CriaTabelaTbUsuario extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_usuario', function (Blueprint $table) {
            $table->bigIncrements('cdUsuario');
            $table->string('nmUsuario', 100);
            $table->string('cdCpfUsuario', 14);
            $table->date('dtNascimentoUsuario');
            $table->string('nrTelefoneUsuario', 15);
            $table->string('dsEmailUsuario', 100);
            $table->string('nmSenhaUsuario', 20);
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
        Schema::dropIfExists('tb_usuario');
    }
}
