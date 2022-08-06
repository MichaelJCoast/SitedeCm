<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMerchSizesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('merch_sizes', function (Blueprint $table) {
            $table->bigInteger('merch_id')->unsigned();
            $table->foreign('merch_id')->references('id')->on('merch')->onDelete('cascade');;
            $table->bigInteger('size_id')->unsigned();
            $table->foreign('size_id')->references('id')->on('sizes')->onDelete('cascade');;

            $table->primary(['merch_id', 'size_id'], 'merch_sizes_merch_id_size_id_primary');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('merch_sizes');
    }
}
