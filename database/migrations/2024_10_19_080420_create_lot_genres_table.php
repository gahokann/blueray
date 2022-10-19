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
        Schema::create('lot_genres', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('lot_id')->unsigned()->index();
            $table->bigInteger('genre_id')->unsigned()->index();
            $table->timestamps();

            $table->foreign('lot_id')->references('id')->on('lots')->onDelete('cascade');
            $table->foreign('genre_id')->references('id')->on('genres')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lot_genres');
    }
};
