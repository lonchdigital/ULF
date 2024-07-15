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
        Schema::create('model_manufacturer_translations', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('model_manufacturer_id')->unsigned();
            $table->foreign('model_manufacturer_id')->references('id')->on('model_manufacturers')->onDelete('cascade');
            $table->string('locale', 10)->index();
            $table->string('name');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('model_manufacturer_translations');
    }
};
