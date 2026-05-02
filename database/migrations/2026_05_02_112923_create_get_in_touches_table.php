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
        Schema::create('get_in_touches', function (Blueprint $table) {
            $table->id();
            $table->string('commitment_title')->nullable();
            $table->text('commitment_desc_one')->nullable();
            $table->text('commitment_desc_two')->nullable();
            $table->string('get_in_touch_title')->nullable();
            $table->text('get_in_touch_desc_one')->nullable();
            $table->text('get_in_touch_desc_two')->nullable();
            $table->string('get_in_touch_primary_button_text')->nullable();
            $table->string('get_in_touch_primary_button_url')->nullable();
            $table->string('get_in_touch_secondary_button_text')->nullable();
            $table->string('get_in_touch_secondary_button_url')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('get_in_touches');
    }
};
