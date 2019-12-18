<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('section_id')->unsigned();
            $table->integer('metric_id')->unsigned();
            $table->string('title');
            $table->string('name');
            $table->text('icon');
            $table->string('nickname');
            $table->boolean('status');
            $table->timestamps();

            $table->foreign('section_id')->references('id')->on('sections');
            $table->foreign('metric_id')->references('id')->on('metrics');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
}
