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
        Schema::table('page_translations', function (Blueprint $table) {
            $table->dropColumn('description');
            $table->dropColumn('breadcrumbs');
            $table->text('seo_text')->nullable()->after('h1');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('page_translations', function (Blueprint $table) {
            $table->text('description')->nullable();
            $table->string('breadcrumbs')->nullable();
            $table->dropColumn('seo_text');
        });
    }
};
