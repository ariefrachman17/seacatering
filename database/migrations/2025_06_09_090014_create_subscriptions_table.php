<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubscriptionsTable extends Migration
{
    public function up()
    {
        Schema::create('subscriptions', function (Blueprint $table) {
            $table->id('subscription_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('package_id');
            $table->foreign('user_id')->references('user_id')->on('users');
            $table->foreign('package_id')->references('package_id')->on('packages');
            $table->decimal('total_price', 10, 2);
            $table->enum('status', ['active', 'paused', 'cancelled']);
            $table->date('start_date');
            $table->date('end_date');
            $table->date('pause_start')->nullable();
            $table->date('pause_end')->nullable();
            $table->timestamps();
        });

    }

    public function down()
    {
        Schema::dropIfExists('subscriptions');
    }
}

