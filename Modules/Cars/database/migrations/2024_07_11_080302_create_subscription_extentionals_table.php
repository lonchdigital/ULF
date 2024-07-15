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
        Schema::create('subscription_extentionals', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('lot_id')->nullable();
            $table->unsignedBigInteger('type_id')->nullable();
            $table->unsignedBigInteger('availability_id')->nullable();
            $table->string('youtube_link')->nullable();
            $table->string('document_link')->nullable();
            $table->unsignedBigInteger('overdrive_price_uah')->nullable();
            $table->unsignedBigInteger('subscription_extentional_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subscription_extentionals');
    }
};
