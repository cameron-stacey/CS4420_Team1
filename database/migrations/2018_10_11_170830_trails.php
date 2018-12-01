<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Trails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trails', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->unsignedInteger('cityId');
            $table->foreign('cityId')->references('id')->on('cities');
            $table->unsignedInteger('stateId');
            $table->foreign('stateId')->references('id')->on('states');
            $table->unsignedInteger('addressId');
            $table->foreign('addressId')->references('id')->on('address');
            $table->integer('elevation');
            $table->integer('distance');
            $table->integer('duration');
            $table->string('difficulty');
            $table->tinyInteger('pet_friendly');
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
        Schema::dropIfExists('trails');
        //
    }
}
