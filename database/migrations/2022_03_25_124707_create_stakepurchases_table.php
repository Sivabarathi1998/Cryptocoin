<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStakepurchasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stakepurchases', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('registers')->onDelete('cascade');

            $table->string('stakeplan');
            $table->string('tenuredate');
            $table->string('invest_quantity');

            $table->string('payoutamount');
            $table->string('payout_perminute');
            $table->string('payout_perhour');
            $table->string('payout_perday');
            $table->string('payout_permonth');
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
        Schema::dropIfExists('stakepurchases');
    }
}
