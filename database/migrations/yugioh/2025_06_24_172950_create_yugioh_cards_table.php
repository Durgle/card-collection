<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('yugioh_cards', function (Blueprint $table) {
            $table->id();
            $table->string('frame_type', 50);
            $table->string('monster_type', 50)->nullable();
            $table->string('icon', 50)->nullable();
            $table->smallInteger('atk')->nullable();
            $table->smallInteger('def')->nullable();
            $table->string('attribute')->nullable();
            $table->unsignedSmallInteger('level')->nullable();
            $table->unsignedSmallInteger('pendulumn_scale')->nullable();
            $table->unsignedSmallInteger('link_level')->nullable();
            $table->string('type')->nullable();
            $table->string('link_marker')->nullable();
            $table->string('password', 10)->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('yugioh_cards');
    }
};
