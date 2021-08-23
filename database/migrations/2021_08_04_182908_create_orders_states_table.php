<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersStatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders_states', function (Blueprint $table) {
            $table->unsignedBigInteger('state_id');
            $table->unsignedBigInteger('orders_id');
            $table->foreign('state_id')->references('id')->on('states')->onDelete('cascade');
            $table->foreign('orders_id')->references('id')->on('orders')->onDelete('cascade');
            $table->primary(['orders_id']);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders_states');
    }
}
