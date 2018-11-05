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
            $table->unsignedInteger('locationId');
            $table->foreign('locationId')->references('locationId')->on('cityState');
            $table->integer('elevation');
            $table->integer('distance');
            $table->integer('duration');
            $table->string('difficulty');
            $table->tinyInteger('guided');
            $table->tinyInteger('pet_friendly');
            $table->unsignedInteger('commentId');
            $table->foreign('commentId')->references('id')->on('comments');
            $table->unsignedInteger('picId');
            $table->foreign('picId')->references('id')->on('pics');
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
