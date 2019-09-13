<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAuthorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('authors', function (Blueprint $table) {
            $table->increments('author_id');
            $table->string('title');
            $table->string('first_name');
            $table->string('last_name');
            $table->timestamps();
        });

        Schema::create('book_author', function(Blueprint $table) {
            $table->integer('book_id')->unsigned();
            $table->integer('author_id')->unsigned();
            $table->foreign('book_id')->references('book_id')->on('books');
            $table->foreign('author_id')->references('author_id')->on('authors');
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
        Schema::dropIfExists('authors');
        Schema::dropIfExists('book_author');
    }
}
