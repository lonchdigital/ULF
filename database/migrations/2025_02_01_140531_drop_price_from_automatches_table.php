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
        Schema::table('automatches', function (Blueprint $table) {
            $table->dropColumn('price');
            $table->dropColumn('comment');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('automatches', function (Blueprint $table) {
            $table->string('price')->after('id')->nullable();
            $table->string('comment')->after('link')->nullable();
        });
    }
};
