<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('images', function (Blueprint $table) {
            $table->increments('image_id');
            $table->string('filename');
            $table->string('path');
            $table->string('size');
            $table->timestamps();
        });

        Schema::table('books', function (Blueprint $table) {
            $table->integer('image_id')->unsigned()->nullable();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('images');
        Schema::table('books', function (Blueprint $table) {
            $table->dropColumn('image_id');
        });
    }
}
