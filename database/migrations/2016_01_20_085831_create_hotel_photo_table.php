<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHotelPhotoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('hotel_photo', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('hotel_id');
            $table->integer('type');
            $table->string('image_path');
            $table->string('desc', 500);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('hotel_photo');
    }
}
