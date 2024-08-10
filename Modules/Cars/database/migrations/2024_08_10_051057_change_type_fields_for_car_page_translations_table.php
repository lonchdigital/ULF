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
        Schema::table('car_page_translations', function (Blueprint $table) {
            $table->text('seo_text')->nullable()->change();
            $table->text('text')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('car_page_translations', function (Blueprint $table) {
            $table->string('seo_text')->nullable()->change();
            $table->string('text')->nullable()->change();
        });
    }
};