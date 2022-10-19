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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name');
            $table->bigInteger('client_id')->unsigned()->index();
            $table->bigInteger('lot_id')->unsigned()->index();
            $table->bigInteger('status_id')->unsigned()->index()->default(1);
            $table->bigInteger('executor_id')->unsigned()->index();
            $table->string('address');

            $table->foreign('client_id')->references('id')->on('users');
            $table->foreign('executor_id')->references('id')->on('users');
            $table->foreign('lot_id')->references('id')->on('lots');
            $table->foreign('status_id')->references('id')->on('order_statuses');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
};
