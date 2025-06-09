<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoginSessionsTable extends Migration
{
    public function up()
    {
        Schema::create('login_sessions', function (Blueprint $table) {
            $table->id('session_id');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('user_id')->on('users');
            $table->timestamp('login_time');
            $table->timestamp('logout_time')->nullable();
            $table->string('ip_address')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('login_sessions');
    }
}
