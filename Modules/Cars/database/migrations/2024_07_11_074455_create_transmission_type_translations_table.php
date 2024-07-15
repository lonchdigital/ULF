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
        Schema::create('transmission_type_translations', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('transmission_type_id')->unsigned();
            $table->foreign('transmission_type_id')->references('id')->on('transmission_types')->onDelete('cascade');
            $table->string('locale', 10)->index();
            $table->string('name');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transmission_type_translations');
    }
};
