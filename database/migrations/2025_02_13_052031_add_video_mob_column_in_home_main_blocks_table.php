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
        Schema::table('home_main_blocks', function (Blueprint $table) {
            $table->string('video_mob')->after('video')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('home_main_blocks', function (Blueprint $table) {
            $table->dropColumn('video_mob');
        });
    }
};
