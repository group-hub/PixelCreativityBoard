<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Donations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('just_giving_id');
            $table->double('amount');
            $table->string('name')->nullable();
            $table->boolean('selected')->default(false);
            $table->integer('fundraiser_id')->unsigned()->nullable();
            $table->timestamps();

            $table->foreign('fundraiser_id')->references('id')->on('fundraisers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('donations', function (Blueprint $table) {
            $table->dropForeign('donations_fundraiser_id_foreign');
        });

        Schema::drop('donations');
    }
}
