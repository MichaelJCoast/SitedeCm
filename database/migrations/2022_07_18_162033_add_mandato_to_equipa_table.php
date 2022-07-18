<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMandatoToEquipaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('equipa', function (Blueprint $table) {
            $table->bigInteger('mandato_id')->unsigned();
            $table->foreign('mandato_id')->references('id')->on('mandatos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('equipa', function (Blueprint $table) {
            $table->dropColumn('mandato_id');
        });
    }
}
