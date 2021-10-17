<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class User2 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('admins', function (Blueprint $table) {
            $table->string("role")->nullable();
            $table->longText("descriptions")->nullable();
            $table->string("username")->unique()->nullable();
            $table->dateTime("email_verification")->nullable();
            $table->string("email_verification_token")->nullable();
            $table->integer("referance_point")->nullable();
            $table->string("reset_password_token")->nullable();
            $table->dateTime("reset_password_expired_date")->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
