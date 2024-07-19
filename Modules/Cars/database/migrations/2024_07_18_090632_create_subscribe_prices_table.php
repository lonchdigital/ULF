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
        Schema::create('subscribe_prices', function (Blueprint $table) {
            $table->id();
            $table->foreignId('car_id')->nullable()->constrained()->onDelete('cascade');
            $table->integer('section_id')->unsigned();
            $table->integer('monthly_payment')->nullable()->unsigned();
            $table->integer('first_payment')->nullable()->unsigned();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subscribe_prices');
    }
};
