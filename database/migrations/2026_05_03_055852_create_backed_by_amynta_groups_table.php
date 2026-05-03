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
        Schema::create('backed_by_amynta_groups', function (Blueprint $table) {
            $table->id();
            $table->string('highlight_title')->nullable();
            $table->text('description_one')->nullable();
            $table->text('description_two')->nullable();
            $table->string('item_title')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('backed_by_amynta_groups');
    }
};
