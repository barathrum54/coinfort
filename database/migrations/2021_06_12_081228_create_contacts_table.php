<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->string("website")->nullable();
            $table->string("symbol");
            $table->string("telegram");
            $table->longText("description");
            $table->string("twitter")->nullable();
            $table->string("discord")->nullable();
            $table->string("reddit")->nullable();
            $table->string("market_cap")->nullable();
            $table->string("price_in_usd")->nullable();
            $table->string("logo");
            $table->date("launch_date");
            $table->longText("other")->nullable();
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
        Schema::dropIfExists('contacts');
    }
}
