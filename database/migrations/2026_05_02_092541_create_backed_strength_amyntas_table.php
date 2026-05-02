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
        Schema::create('backed_strength_amyntas', function (Blueprint $table) {
            $table->id();
            $table->string('highlight_title')->nullable();
            $table->text('description')->nullable();
            $table->string('item_title')->nullable();
            $table->string('item_one')->nullable();
            $table->string('item_two')->nullable();
            $table->string('item_three')->nullable();
            $table->string('item_four')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('backed_strength_amyntas');
    }
};
