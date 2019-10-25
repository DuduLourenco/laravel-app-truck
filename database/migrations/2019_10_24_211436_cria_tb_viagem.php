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
            $table->string('dsOrigemLat');
            $table->string('dsOrigemLng');
            $table->string('dsDestinoLat');
            $table->string('dsDestinoLng');
            $table->string('dsDistancia');
            $table->string('dsTempo');
            $table->string('dtPrazo');
            $table->string('hrPrazo');
            $table->string('dsGastos');
            $table->string('dsValor');
            $table->string('dsLucro');
            $table->string('dsStatus');
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
