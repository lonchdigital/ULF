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
        Schema::create('page_block_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('page_block_id')->constrained('page_blocks')->cascadeOnDelete();
            $table->string('locale', 10)->nullable();
            $table->text('title')->nullable();
            $table->text('description')->nullable();
            $table->longText('content')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('page_block_translations');
    }
};
