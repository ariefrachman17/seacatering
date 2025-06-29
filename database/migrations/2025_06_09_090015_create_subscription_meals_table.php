<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubscriptionMealsTable extends Migration
{
    public function up()
    {
        Schema::create('subscription_meals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('subscription_id')
                  ->constrained('subscriptions', 'subscription_id')
                  ->onDelete('cascade');
            $table->enum('meal_type', ['breakfast', 'lunch', 'dinner']);
            $table->timestamps();
            
            $table->index('subscription_id');
        });
    }

    public function down()
    {
        Schema::dropIfExists('subscription_meals');
    }
}

