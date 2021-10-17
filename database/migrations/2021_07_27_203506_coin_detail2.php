<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CoinDetail2 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('coins', function (Blueprint $table) {
            $table->text("symbol")->nullable();
            $table->text("description")->nullable();
            $table->text("website")->nullable();
            $table->text("twitter")->nullable();
            $table->text("telegram")->nullable();
            $table->text("discord")->nullable();
            $table->text("reddit")->nullable();
            $table->text("market_cap")->nullable();
            $table->text("price")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('coins', function (Blueprint $table) {
            //
        });
    }
}
