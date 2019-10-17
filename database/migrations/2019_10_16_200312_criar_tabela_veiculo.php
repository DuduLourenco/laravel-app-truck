<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CriarTabelaVeiculo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_veiculo', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idUsuario')->unsigned();            
            $table->integer('idModelo')->unsigned();
            $table->string('nmPlacaVeiculo');
            $table->string('anoVeiculo');
            $table->string('dsConsumoVeiculo');
            $table->foreign('idUsuario')->references('id')->on('tb_usuario')->onDelete('cascade');
            $table->foreign('idModelo')->references('id')->on('tb_modelo_veiculo')->onDelete('cascade');
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
        Schema::dropIfExists('tb_veiculo');
    }
}
