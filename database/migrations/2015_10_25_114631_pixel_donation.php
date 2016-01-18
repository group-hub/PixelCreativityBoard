<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PixelDonation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pixel_donations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('pixel_id')->unsigned();
            $table->integer('donation_id')->unsigned();
            $table->string('color');
            $table->integer('grid_num');

            $table->foreign('pixel_id')->references('id')->on('pixels');
            $table->foreign('donation_id')->references('id')->on('donations');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pixel_donations', function (Blueprint $table) {
            $table->dropForeign('pixel_donations_pixel_id_foreign');
            $table->dropForeign('pixel_donations_donation_id_foreign');
        });
        Schema::drop('pixel_donations');
    }
}
