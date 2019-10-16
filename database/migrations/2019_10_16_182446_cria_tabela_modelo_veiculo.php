<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CriaTabelaModeloVeiculo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_modelo_veiculo', function (Blueprint $table) {
            $table->increments('cdModelo');
            $table->string('nmModelo', 100);
            $table->string('nnModelo', 4);
            $table->integer('cdMarca')->unsigned();
            $table->foreign('cdMarca')->references('cdMarca')->on('tb_marca_veiculo')->onDelete('cascade');
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
        Schema::dropIfExists('tb_modelo_veiculo');
    }
}
