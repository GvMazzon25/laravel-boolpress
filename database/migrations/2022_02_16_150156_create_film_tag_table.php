<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFilmTagTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('film_tag', function (Blueprint $table) {
            $table->id();
            

            //FK FILM
            $table->unsignedBigInteger('film_id');

            $table->foreign('film_id')
                  ->references('id')
                  ->on('films')
                  ->onDelete('cascade');

            //FK tags
            $table->unsignedBigInteger('tag_id');

            $table->foreign('tag_id')
                  ->references('id')
                  ->on('tags')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('film_tag');
    }
}
