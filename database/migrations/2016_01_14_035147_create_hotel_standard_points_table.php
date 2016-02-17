<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHotelStandardPointsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hotel_standard_points', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('record_id');
            $table->integer('standard_id');
            $table->integer('score');
            $table->integer('points');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('hotel_standard_points');
    }
}
