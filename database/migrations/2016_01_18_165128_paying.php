<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Paying extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paying', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
        });

        Schema::create('paying_pixels', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('pixel_id')->unsigned();
            $table->integer('paying_id')->unsigned();
            $table->string('color');

            $table->foreign('pixel_id')->references('id')->on('pixels');
            $table->foreign('paying_id')->references('id')->on('paying');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('paying_pixels', function (Blueprint $table) {
            $table->dropForeign('paying_pixels_pixel_id_foreign');
            $table->dropForeign('paying_pixels_paying_id_foreign');
        });
        Schema::drop('paying_pixels');

        Schema::drop('paying');
    }
}
