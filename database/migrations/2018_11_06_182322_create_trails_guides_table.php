<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrailsGuidesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trails_guides', function (Blueprint $table) {
            $table->unsignedInteger('trailId');
            $table->foreign('trailId')->references('trailId')->on('trails');
            $table->unsignedInteger('guideId');
            $table->foreign('guideId')->references('id')->on('guides');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trails_guides');
    }
}
