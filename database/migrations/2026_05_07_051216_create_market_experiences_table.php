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
        Schema::create('market_experiences', function (Blueprint $table) {
            $table->id();
            $table->string('platform_title');
            $table->text('platform_description_one');
            $table->string('platform_item_one');
            $table->string('platform_item_two');
            $table->string('platform_item_three');
            $table->text('platform_description_two');
            $table->string('market_experience_title');
            $table->text('market_experience_description');
            $table->string('market_experience_name');
            $table->text('market_experience_name_description');
            $table->text('market_experience_quote');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('market_experiences');
    }
};
