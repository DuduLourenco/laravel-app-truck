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
            $table->increments('id');
            $table->string('nmUsuario', 100)->requiered();
            $table->string('cdCpfUsuario', 14)->unique()->requiered();
            $table->date('dtNascimentoUsuario')->requiered();
            $table->string('nrTelefoneUsuario', 15)->unique();
            $table->string('dsEmailUsuario', 100)->unique();
            $table->string('nmSenhaUsuario', 100)->requiered();
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
