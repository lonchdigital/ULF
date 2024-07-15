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
        Schema::create('subscription_period_translations', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('subscription_period_id')->unsigned();
            $table->foreign('subscription_period_id')->references('id')->on('subscription_periods')->onDelete('cascade');
            $table->string('locale', 10)->index();
            $table->text('description');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subscription_period_translations');
    }
};
