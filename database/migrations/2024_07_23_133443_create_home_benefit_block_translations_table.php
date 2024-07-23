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
        Schema::create('home_benefit_block_translations', function (Blueprint $table) {
            $table->id();
            
            $table->bigInteger('home_benefit_block_id')->unsigned();
            $table->foreign('home_benefit_block_id')->references('id')->on('home_benefit_blocks')->onDelete('cascade');

            $table->string('locale', 10)->index();
            $table->string('title')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('home_benefit_block_translations');
    }
};
