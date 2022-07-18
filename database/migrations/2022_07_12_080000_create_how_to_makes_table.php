<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHowToMakesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('how_to_makes', function (Blueprint $table) {
            $table->id('how_to_make_id')->comment('作り方id');
            $table->integer('recipe_id')->comment('レシピid');
            $table->string('make')->comment('作り方');
            $table->integer('order')->comment('作り方手順');
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
        Schema::dropIfExists('how_to_makes');
    }
}
