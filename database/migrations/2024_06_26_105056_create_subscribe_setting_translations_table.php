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
        Schema::create('subscribe_setting_translations', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('subscribe_setting_id')->unsigned();
            $table->string('locale', 3)->index();

            $table->string('title')->nullable();

            $table->unique(['subscribe_setting_id', 'locale'], 'subscribe_setting_id_locale_unique');
            $table->foreign('subscribe_setting_id')->references('id')->on('subscribe_settings')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subscribe_setting_translations');
    }
};
