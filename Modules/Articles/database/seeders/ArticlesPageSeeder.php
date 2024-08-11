<?php

namespace Modules\Articles\database\seeders;

use Illuminate\Database\Seeder;
use Modules\Articles\app\Http\Controllers\Web\ArticlesController;
use Modules\Articles\Models\ArticlePage;
use Modules\Articles\Models\ArticlePageTranslation;

class ArticlesPageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $page = ArticlePage::firstOrCreate([
            'section' => 'articles',
            'slug' => 'articles',
            'action' => 'index',
            'controller' => ArticlesController::class,
        ]);

        ArticlePageTranslation::firstOrCreate([
            'article_page_id' => $page->id,
            'name' => 'Блог',
            'h1' => 'Блог',
            'locale' => 'uk',
        ]);

        ArticlePageTranslation::firstOrCreate([
            'article_page_id' => $page->id,
            'name' => 'Блог',
            'h1' => 'Блог',
            'locale' => 'ru',
        ]);
    }

}
