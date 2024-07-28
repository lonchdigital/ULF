<?php

namespace Database\Seeders;

use App\Http\Controllers\Web\PageController;
use App\Models\Page;
use App\Models\PageTranslation;
use Illuminate\Database\Seeder;

class RentalAgreementPageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $page = Page::firstOrCreate([
            'controller' => PageController::class,
            'slug' => 'rental-agreement',
            'active' => 1,
        ]);

        $text_uk = <<<EOT
        <p>Договір прокату UK</p>
        EOT;

        $text_ru = <<<EOT
        <p>Договор проката RU</p>
        EOT;


        PageTranslation::firstOrCreate([
            'page_id' => $page->id,
            'name' => 'Договір прокату',
            'h1' => 'Договір прокату',
            'text' => $text_uk,
            'locale' => 'uk',
        ]);

        PageTranslation::firstOrCreate([
            'page_id' => $page->id,
            'name' => 'Договор проката',
            'h1' => 'Договор проката',
            'text' => $text_ru,
            'locale' => 'ru',
        ]);
    }
}
