<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDishsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dishs', function (Blueprint $table) {
            $table->id('dish_id')->comment('一汁三菜id');
            $table->integer('recipe_id')->comment('レシピid');
            $table->integer('is_main')->comment('主菜フラグ');
            $table->integer('is_side')->comment('副菜フラグ');
            $table->integer('is_soup')->comment('汁物フラグ');
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
        Schema::dropIfExists('dishs');
    }
}
