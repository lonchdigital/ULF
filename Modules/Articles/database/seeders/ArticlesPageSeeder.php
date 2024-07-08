<?php

namespace Modules\Articles\database\seeders;

use App\Models\Page;
use App\Models\PageTranslation;
use Illuminate\Database\Seeder;
use Modules\Articles\Entities\Article;
use Modules\Articles\Entities\ArticlePage;
use Modules\Articles\Entities\ArticlePageTranslation;
use Modules\Articles\Http\Controllers\Web\ArticlesController;

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
            'locale' => 'ua',
        ]);

        ArticlePageTranslation::firstOrCreate([
            'article_page_id' => $page->id,
            'name' => 'Блог',
            'h1' => 'Блог',
            'locale' => 'ru',
        ]);

    }

}
