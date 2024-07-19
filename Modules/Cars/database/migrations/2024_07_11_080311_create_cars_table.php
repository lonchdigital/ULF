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
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            // $table->foreignId('vehicle_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('vehicle_id')->constrained()->onDelete('cascade');
            $table->foreignId('car_page_id')->constrained()->onDelete('cascade');
            $table->unsignedBigInteger('lot_id')->nullable();
            $table->tinyInteger('label_color_id')->unsigned()->default(1);
            $table->tinyInteger('status_id')->unsigned()->default(1);
            $table->tinyInteger('popularity_id')->unsigned()->default(1);
            $table->tinyInteger('sort_by_popularity_id')->nullable()->unsigned();
            $table->string('subscription_category')->nullable();
            $table->foreignId('subscription_period_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('subscription_extentional_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('advertisement_city_id')->nullable()->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};
