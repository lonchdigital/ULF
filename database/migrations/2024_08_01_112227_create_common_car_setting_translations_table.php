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
        Schema::create('common_car_setting_translations', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('common_car_setting_id')->unsigned();
            $table->foreign('common_car_setting_id')->references('id')->on('common_car_settings')->onDelete('cascade');

            $table->string('locale', 10)->index();

            $table->string('first_payment_note')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('common_car_setting_translations');
    }
};
