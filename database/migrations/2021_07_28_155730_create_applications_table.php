<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applications', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->longText("description")->nullable();;
            $table->string("website")->nullable();
            $table->string("symbol")->nullable();;
            $table->string("telegram")->nullable();;
            $table->string("twitter")->nullable();
            $table->string("discord")->nullable();
            $table->string("reddit")->nullable();
            $table->string("market_cap")->nullable();
            $table->string("price_in_usd")->nullable();
            $table->string("logo")->nullable();;
            $table->date("launch_date")->nullable();;
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
        Schema::dropIfExists('applications');
    }
}
