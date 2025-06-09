<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAllergyNotesTable extends Migration
{
    public function up()
    {
        Schema::create('allergy_notes', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('subscription_id');
            $table->foreign('subscription_id')->references('subscription_id')->on('subscriptions');
            $table->text('note')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('allergy_notes');
    }
}

