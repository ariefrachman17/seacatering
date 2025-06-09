<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubscriptionMealsTable extends Migration
{
    public function up()
    {
        Schema::create('subscription_meals', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('subscription_id');
            $table->foreign('subscription_id')->references('subscription_id')->on('subscriptions');
            $table->enum('meal_type', ['Breakfast', 'Lunch', 'Dinner']);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('subscription_meals');
    }
}

