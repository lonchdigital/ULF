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
        Schema::create('subscription_periods', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('subscription_period_id');
            $table->unsignedInteger('price_usd')->nullable();
            $table->unsignedInteger('price_uah')->nullable();
            $table->unsignedInteger('deposit_months')->nullable();
            $table->unsignedInteger('min_months')->nullable();
            $table->unsignedInteger('max_months')->nullable();
            $table->unsignedBigInteger('lot_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subscription_periods');
    }
};
