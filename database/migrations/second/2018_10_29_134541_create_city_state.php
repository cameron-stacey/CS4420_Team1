<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCityState extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     
    public function up()
    {
        Schema::create('cityState', function (Blueprint $table) {
            $table->increments('locationId');
            $table->unsignedInteger('cityId');
            $table->foreign('cityId')->references('cityId')->on('city');
            $table->unsignedInteger('stateId');
            $table->foreign('stateId')->references('stateId')->on('state');
        });
        //
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cityState');
        //
    }
}
