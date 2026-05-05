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
        Schema::create('mortgage_credits', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->text('description_one')->nullable();
            $table->text('description_two')->nullable();
            $table->text('contact_icon')->nullable();
            $table->string('contact_title')->nullable();
            $table->string('contact_item_one')->nullable();
            $table->string('contact_item_two')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mortgage_credits');
    }
};
