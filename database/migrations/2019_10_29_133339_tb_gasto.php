<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TbGasto extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_gasto', function (Blueprint $table){
            $table->increments('id');
            $table->integer('idUsuario')->unsigned();
            $table->string('dsTipo')->required();
            $table->double('dsValor')->required();
            $table->date('dtGasto')->required();
            $table->foreign('idUsuario')->references('id')->on('tb_usuario')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        Schema::dropIfExists('tb_gasto');
    }
}
