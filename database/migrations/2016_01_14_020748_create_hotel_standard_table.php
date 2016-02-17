<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHotelStandardTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hotel_standard', function (Blueprint $table) {
            $table->increments('id');
            $table->string('standard_id',100);
            $table->string('standard_desc',1000);
            $table->string('category',100);
            $table->string('department',100);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('hotel_standard');
    }
}
