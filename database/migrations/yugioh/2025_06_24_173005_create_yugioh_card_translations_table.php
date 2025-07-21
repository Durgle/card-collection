<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('yugioh_card_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('card_id')->constrained('yugioh_cards')->onDelete('cascade');
            $table->string('language_code', 5);
            $table->string('name');
            $table->text('description')->nullable();
            $table->string('pendulum_effect')->nullable();
            $table->timestamps();

            $table->foreign('language_code')->references('code')->on('languages')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('yugioh_card_translations');
    }
};
