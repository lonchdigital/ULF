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
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->string('vin', 17)->nullable();
            $table->smallInteger('manufacturedYear')->nullable();
            $table->unsignedBigInteger('engineVolume')->nullable();
            $table->unsignedBigInteger('mileage')->nullable();
            $table->foreignId('model_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('fuel_type_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('transmission_type_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('color_type_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('type_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('driver_type_id')->nullable()->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicles');
    }
};
