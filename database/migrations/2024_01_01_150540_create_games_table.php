<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('games', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();
            $table->string('genre')->nullable();
            $table->date('release_date')->nullable();
            $table->string('platform')->nullable();
            $table->integer('rating')->nullable();
            $table->string('publisher')->nullable();
            $table->string('developer')->nullable();
            $table->string('image')->nullable();
            $table->boolean('multiplayer')->default(false);
            $table->decimal('price', 8, 2)->default(0.00);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('games');
    }
};