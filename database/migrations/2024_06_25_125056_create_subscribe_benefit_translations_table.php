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
        Schema::create('subscribe_benefit_translations', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('subscribe_benefit_id')->unsigned();
            $table->string('locale', 3)->index();

            $table->string('title')->nullable();

            //$table->unique(['subscribe_benefit_id','locale']);
            $table->unique(['subscribe_benefit_id', 'locale'], 'subscribe_benefit_id_locale_unique');
            $table->foreign('subscribe_benefit_id')->references('id')->on('subscribe_benefits')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subscribe_benefit_translations');
    }
};
