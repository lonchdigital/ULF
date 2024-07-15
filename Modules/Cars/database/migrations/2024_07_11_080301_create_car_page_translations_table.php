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
        Schema::create('car_page_translations', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('car_page_id')->unsigned();
            $table->foreign('car_page_id')->references('id')->on('car_pages')->onDelete('cascade');
            $table->string('locale', 10)->index();
            $table->string('name');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('car_page_translations');
    }
};
