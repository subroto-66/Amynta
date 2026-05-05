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
        Schema::create('portfolio_credits', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('description')->nullable();
            
            $table->string('item_one_number')->nullable();
            $table->string('item_one_text')->nullable();
            $table->string('item_two_number')->nullable();
            $table->string('item_two_text')->nullable();
            $table->string('item_three_number')->nullable();
            $table->string('item_three_text')->nullable();


            $table->text('asset_classes_one_title')->nullable();
            $table->text('asset_classes_one_icon')->nullable();
            
            $table->text('asset_classes_two_title')->nullable();
            $table->text('asset_classes_two_icon')->nullable();

            $table->text('asset_classes_three_title')->nullable();
            $table->text('asset_classes_three_icon')->nullable();

            $table->text('asset_classes_four_title')->nullable();
            $table->text('asset_classes_four_icon')->nullable();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('portfolio_credits');
    }
};
