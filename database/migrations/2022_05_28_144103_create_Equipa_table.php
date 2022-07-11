<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEquipaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('equipa', function (Blueprint $table) {
            $table->increments('id');
            $table->string('image');
            $table->string('nome');
         
            $table->bigInteger('dep_id')->unsigned();
            $table->foreign('dep_id')->references('id')->on('departments');
         
            $table->bigInteger('role_id')->unsigned();
            $table->foreign('role_id')->references('id')->on('cargos');
         
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
        Schema::dropIfExists('Equipa');
    }
}
