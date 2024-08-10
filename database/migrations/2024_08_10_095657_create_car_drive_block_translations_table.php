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
        Schema::create('car_drive_block_translations', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('car_drive_block_id')->unsigned();
            $table->foreign('car_drive_block_id')->references('id')->on('car_drive_blocks')->onDelete('cascade');

            $table->string('locale', 10)->index();

            $table->string('title')->nullable();
            $table->string('step_one')->nullable();
            $table->string('step_two')->nullable();
            $table->string('step_three')->nullable();
            $table->string('step_four')->nullable();
            $table->string('step_five')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('car_drive_block_translations');
    }
};
