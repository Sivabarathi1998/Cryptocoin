<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStakeplansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stakeplans', function (Blueprint $table) {
            $table->id();
            $table->string('stakename');
            $table->bigInteger('coin_id')->unsigned();
            $table->foreign('coin_id')->references('id')->on('coins')->onDelete('cascade');
            $table->string('duration');
            $table->string('payout');
            $table->integer('investment');
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
        Schema::dropIfExists('stakeplans');
    }
}
