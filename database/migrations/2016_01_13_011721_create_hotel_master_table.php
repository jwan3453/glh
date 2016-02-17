<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHotelMasterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hotel_master', function (Blueprint $table) {
            $table->increments('id');
            //hotel basic info
            $table->string('name',50);
            $table->integer('province_id');
            $table->integer('city_id');
            $table->string('address');
            $table->string('contact_no',50);
            $table->string('email');
            $table->string('post_code',40);
            $table->string('website');

            $table->string('PMS');
            $table->integer('room_unit');
            $table->string('airport',50);
            $table->integer('hotel_cat_id');
            $table->string('hotel_type_ids');
            $table->string('hotel_facility_list',500);
            $table->string('short_desc');
            $table->string('product_feature');
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
        Schema::drop('hotel_master');
    }
}
