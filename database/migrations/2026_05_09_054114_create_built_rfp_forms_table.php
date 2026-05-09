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
        Schema::create('built_rfp_forms', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->string('button_text')->nullable();
            $table->string('button_link')->nullable();

            $table->string('rfp_form_title')->nullable();
            $table->text('rfp_form_subtitle')->nullable();
            $table->text('rfp_item_one')->nullable();
            $table->text('rfp_item_two')->nullable();
            $table->text('rfp_item_three')->nullable();

            $table->text('rfp_footer_text')->nullable();
            $table->timestamps();
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('built_rfp_forms');
    }
};
