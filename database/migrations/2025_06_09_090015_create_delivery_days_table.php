<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeliveryDaysTable extends Migration
{
    public function up()
    {
        Schema::create('delivery_days', function (Blueprint $table) {
            $table->id();
            $table->foreignId('subscription_id')
                  ->constrained('subscriptions', 'subscription_id')
                  ->onDelete('cascade');
            $table->enum('day', ['monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'saunday']);
            $table->timestamps();
            
            $table->index('subscription_id');
        });
    }


    public function down()
    {
        Schema::dropIfExists('delivery_days');
    }
}
