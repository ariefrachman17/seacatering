<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeliveryDaysTable extends Migration
{
    public function up()
    {
        Schema::create('delivery_days', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('subscription_id');
            $table->foreign('subscription_id')->references('subscription_id')->on('subscriptions');
            $table->enum('day', ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday']);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('delivery_days');
    }
}
