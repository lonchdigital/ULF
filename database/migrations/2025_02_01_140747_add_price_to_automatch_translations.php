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
        Schema::table('automatch_translations', function (Blueprint $table) {
            $table->string('price')->after('description')->nullable();
            $table->string('comment')->after('price')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('automatch_translations', function (Blueprint $table) {
            $table->dropColumn('price');
            $table->dropColumn('comment');
        });
    }
};
