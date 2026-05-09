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
        Schema::create('not_confusions', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description_one');
            $table->text('description_two');
            $table->string('button_text');
            $table->string('button_link');
            $table->string('understanding_title');
            $table->text('understanding_item_one');
            $table->text('understanding_item_two');
            $table->text('understanding_item_three');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('not_confusions');
    }
};
