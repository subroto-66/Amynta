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
        Schema::create('contingency_leaderships', function (Blueprint $table) {
            $table->id();
            $table->string('leadership_title')->nullable();
            $table->string('leadership_image')->nullable();
            $table->string('leadership_name')->nullable();
            $table->string('leadership_position')->nullable();
            $table->text('leadership_description')->nullable();

            $table->string('broker_title')->nullable();
            $table->text('broker_description')->nullable();

            $table->string('primary_broker_button_text')->nullable();
            $table->string('primary_broker_button_link')->nullable();
            $table->string('secondary_broker_button_text')->nullable();
            $table->string('secondary_broker_button_link')->nullable();

            $table->string('brokers_items_one')->nullable();
            $table->string('brokers_items_two')->nullable();
            $table->string('brokers_items_three')->nullable();
            $table->string('brokers_items_four')->nullable();
            $table->string('brokers_items_five')->nullable();
            $table->string('brokers_items_six')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contingency_leaderships');
    }
};
