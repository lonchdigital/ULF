<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{


    public function up(): void
    {
        Schema::table('pages', function (Blueprint $table) {
            $table->dropColumn('pageable_id');
            $table->dropColumn('section');
            $table->dropColumn('pageable_type');
            $table->dropColumn('action');

            $table->string('key')->nullable()->after('active');
        });
    }


    public function down(): void
    {
        Schema::table('pages', function (Blueprint $table) {
            $table->bigInteger('pageable_id')->nullable();
            $table->string('section');
            $table->string('pageable_type');
            $table->string('action')->nullable();

            $table->dropColumn('key');
        });
    }

};
