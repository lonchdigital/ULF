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
        Schema::create('advertisement_city_translations', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('advertisement_city_id')->unsigned();
            $table->foreign('advertisement_city_id')->references('id')->on('advertisement_cities')->onDelete('cascade');
            $table->string('locale', 10)->index();
            $table->string('name');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('advertisement_city_translations');
    }
};
