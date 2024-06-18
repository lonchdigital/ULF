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
        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('pageable_id')->nullable();
            $table->string('section');
            $table->string('slug')->comment('url-страницы');
            $table->string('pageable_type');
            $table->string('action')->nullable();
            $table->string('controller')->nullable();
            $table->boolean('active')->default(true);

            $table->softDeletes();
            $table->index(['pageable_type', 'pageable_id'], 'pageable_index_columns');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pages');
    }
};
