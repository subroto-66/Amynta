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
        Schema::create('corporate_credits', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->text('insure_title')->nullable();
            $table->text('insure_description')->nullable();
            $table->string('insure_icon')->nullable();

            $table->string('covered_title')->nullable();
            $table->string('covered_item_one_title')->nullable();
            $table->string('covered_item_two_title')->nullable();
            $table->string('covered_item_three_title')->nullable();
            $table->text('covered_item_one_icon')->nullable();
            $table->text('covered_item_two_icon')->nullable();
            $table->text('covered_item_three_icon')->nullable();

            $table->string('contact_title')->nullable();
            $table->string('contact_item_one_title')->nullable();
            $table->string('contact_item_two_title')->nullable();
            $table->text('contact_item_one_icon')->nullable();
            $table->text('contact_item_two_icon')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('corporate_credits');
    }
};
