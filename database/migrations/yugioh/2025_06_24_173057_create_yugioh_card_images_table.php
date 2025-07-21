<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('yugioh_card_images', function (Blueprint $table) {
            $table->id();
            $table->foreignId('card_id')->constrained('yugioh_cards')->onDelete('cascade');
            $table->string('filename')->unique();
            $table->string('filename_small')->nullable();
            $table->string('filename_cropped')->nullable();
            $table->boolean('primary')->default(false);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('yugioh_card_images');
    }
};
