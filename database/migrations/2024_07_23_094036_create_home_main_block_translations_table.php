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
        Schema::create('home_main_block_translations', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('home_main_block_id')->unsigned();
            $table->unique(['home_main_block_id', 'locale']);
            $table->foreign('home_main_block_id')->references('id')->on('home_main_blocks')->onDelete('cascade');
            
            $table->string('locale', 10)->index();

            $table->string('title')->nullable();
            $table->text('running_text')->nullable();
            $table->string('description')->nullable();
            $table->string('button_one')->nullable();
            $table->string('button_two')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('home_main_block_translations');
    }
};
