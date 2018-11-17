<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserExtendedInfo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('userExtInfo', function (Blueprint $table){
            $table->unsignedInteger('userId');
            $table->foreign('userId')->references('id')->on('users');
            $table->binary('gender');
            $table->integer('age');
            $table->text('about');
            $table->unsignedInteger('locationId');
            $table->foreign('locationId')->references('id')->on('cityState');
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
        Schema::dropIfExists('userExtInfo');
        //
    }
}
