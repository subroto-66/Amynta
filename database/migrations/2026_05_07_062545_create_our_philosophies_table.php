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
        Schema::create('our_philosophies', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('subtitle')->nullable();
            $table->text('description')->nullable();
            $table->text('qoute_one')->nullable();
            $table->text('qoute_two')->nullable();
            $table->string('item_one')->nullable();
            $table->string('item_two')->nullable();
            $table->string('item_three')->nullable();
            $table->string('item_four')->nullable();
            $table->string('item_five')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('our_philosophies');
    }
};
