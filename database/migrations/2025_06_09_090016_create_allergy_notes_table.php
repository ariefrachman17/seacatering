<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAllergyNotesTable extends Migration
{
    public function up()
    {
        Schema::create('allergy_notes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('subscription_id')
                  ->constrained('subscriptions', 'subscription_id')
                  ->onDelete('cascade');
            $table->text('note');
            $table->timestamps();
            
            $table->index('subscription_id');
        });
    }

    public function down()
    {
        Schema::dropIfExists('allergy_notes');
    }
}

