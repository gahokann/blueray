<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lots', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('img');
            $table->string('description');
            $table->double('price');
            $table->double('rating');
            $table->bigInteger('genre_id')->unsigned()->index();
            $table->bigInteger('user_id')->unsigned();

            $table->index('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('genre_id')->references('id')->on('genres');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lots');
    }
};
