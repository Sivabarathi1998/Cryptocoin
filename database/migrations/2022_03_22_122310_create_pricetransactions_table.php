<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePricetransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pricetransactions', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('from_id')->unsigned();
            $table->string('from_address');
            $table->bigInteger('coin_id')->unsigned();
            $table->double('amount');
            $table->bigInteger('to_id')->unsigned();
            $table->string('to_address');

            $table->foreign('from_id')->references('id')->on('registers')->onDelete('cascade');
            $table->foreign('to_id')->references('id')->on('registers')->onDelete('cascade');
            $table->foreign('coin_id')->references('id')->on('coins')->onDelete('cascade');

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
        Schema::dropIfExists('pricetransactions');
    }
}
