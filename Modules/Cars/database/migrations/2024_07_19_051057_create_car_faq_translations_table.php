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
        Schema::create('car_faq_translations', function (Blueprint $table) {
            $table->id();
            
            $table->bigInteger('car_faq_id')->unsigned();
            $table->string('locale', 10)->index();

            $table->string('question')->nullable();
            $table->text('answer')->nullable();

            $table->unique(['car_faq_id', 'locale']);
            $table->foreign('car_faq_id')->references('id')->on('car_faqs')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('car_faq_translations');
    }
};
