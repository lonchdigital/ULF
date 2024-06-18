<?php

namespace Modules\Articles\database\seeders;

use App\Models\Page;
use App\Models\PageTranslation;
use Illuminate\Database\Seeder;
use Modules\Articles\Entities\Article;
use Modules\Articles\Http\Controllers\Web\ArticlesController;

class ArticlesPageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $page = Page::firstOrCreate([
            'section' => 'articles',
            'slug' => 'articles',
            'pageable_type' => Article::class,
            'action' => 'index',
            'controller' => ArticlesController::class,
        ]);

        PageTranslation::firstOrCreate([
            'page_id' => $page->id,
            'name' => 'Блог',
            'h1' => 'Блог',
            'locale' => 'ua',
        ]);

        PageTranslation::firstOrCreate([
            'page_id' => $page->id,
            'name' => 'Блог',
            'h1' => 'Блог',
            'locale' => 'ru',
        ]);

    }

}
