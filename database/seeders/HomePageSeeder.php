<?php

namespace Database\Seeders;

use App\Http\Controllers\Web\HomeController;
use App\Models\Page;
use App\Models\PageTranslation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HomePageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $page = Page::firstOrCreate([
            'controller' => HomeController::class,
            'slug' => '/',
            'key' => 'homepage',
            'active' => 1,
        ]);

        PageTranslation::firstOrCreate([
            'page_id' => $page->id,
            'name' => 'Головна сторінка',
            'h1' => 'Головна сторінка',
            'locale' => 'uk',
        ]);

        PageTranslation::firstOrCreate([
            'page_id' => $page->id,
            'name' => 'Главная страница',
            'h1' => 'Главная страница',
            'locale' => 'ru',
        ]);
    }
}
