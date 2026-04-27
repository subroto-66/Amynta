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
        Schema::create('heroes', function (Blueprint $table) {
            $table->id();
            $table->string('title_one')->nullable();
            $table->string('title_two')->nullable();
            $table->text('highlight_text')->nullable();
            $table->text('description_one')->nullable();
            $table->text('description_two')->nullable();
            $table->string('primary_button_text')->nullable();
            $table->string('primary_button_link')->nullable();
            $table->string('secondary_button_text')->nullable();
            $table->string('secondary_button_link')->nullable();
            $table->string('page_name')->nullable();
            $table->string('feature_one_title')->nullable();
            $table->string('feature_two_title')->nullable();
            $table->string('feature_three_title')->nullable();
            $table->string('short_title_one')->nullable();
            $table->string('short_title_two')->nullable();
            $table->text('short_description_one')->nullable();
            $table->text('short_description_two')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('heroes');
    }
};
