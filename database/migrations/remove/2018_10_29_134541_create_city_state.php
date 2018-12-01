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
            $table->increments('id');
            $table->unsignedInteger('cityId');
            $table->foreign('cityId')->references('id')->on('cities');
            $table->unsignedInteger('stateId');
            $table->foreign('stateId')->references('id')->on('states');
            $table->string('address');
            $table->timestamps();
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
