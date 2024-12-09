<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('page_translations', function (Blueprint $table) {
            $table->longText('text')->nullable()->change();
        });
    }

    public function down()
    {
        Schema::table('page_translations', function (Blueprint $table) {
            $table->text('text')->nullable()->change();
        });
    }
};
