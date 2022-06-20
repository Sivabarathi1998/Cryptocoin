<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
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
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('seller_id')->unsigned()->nullable();

            $table->bigInteger('coin_id')->unsigned();

            $table->foreign('user_id')->references('id')->on('registers')->onDelete('cascade');
            $table->foreign('seller_id')->references('id')->on('registers')->onDelete('cascade');
            $table->foreign('coin_id')->references('id')->on('coins')->onDelete('cascade');
            $table->integer('quantity');
            $table->string('status');
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
        Schema::dropIfExists('orders');
    }
}
