<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CriaTbViagem extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_viagem', function (Blueprint $table) {
            $table->increments('id');
            $table->double('dsOrigemLat')->required();
            $table->double('dsOrigemLng')->required();
            $table->double('dsDestinoLat')->required();
            $table->double('dsDestinoLng')->required();
            $table->double('dsDistancia')->required();
            $table->string('dsTempo')->required();
            $table->date('dtPrazo')->required();
            $table->time('hrPrazo')->required();
            $table->double('dsGastos')->required();
            $table->double('dsGastoManutencao')->required();
            $table->double('dsValor')->required();
            $table->double('dsLucro')->required();
            $table->string('dsStatus')->required();
            $table->integer('idUsuario')->unsigned();
            $table->integer('idVeiculo')->unsigned();
            $table->foreign('idUsuario')->references('id')->on('tb_usuario')->onDelete('cascade');
            $table->foreign('idVeiculo')->references('id')->on('tb_veiculo')->onDelete('cascade');
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
        Schema::dropIfExists('tb_viagem');
    }
}
