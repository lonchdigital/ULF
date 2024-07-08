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
        Schema::create('article_page_translations', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('article_page_id')->unsigned();
            $table->string('locale', 3)->index();
            $table->string('name');
            $table->text('description')->nullable();
            $table->text('text')->nullable();

            $table->string('h1')->nullable();
            $table->string('meta_title')->nullable();
            $table->string('meta_description')->nullable();
            $table->string('meta_keywords')->nullable();
            $table->string('breadcrumbs')->nullable();
            $table->string('anchor')->nullable();

            $table->foreign('article_page_id')->references('id')->on('article_pages')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('article_page_translations');
    }
};
