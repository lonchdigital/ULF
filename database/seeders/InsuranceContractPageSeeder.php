<?php

namespace Database\Seeders;

use App\Http\Controllers\Web\PageController;
use App\Models\Page;
use App\Models\PageTranslation;
use Illuminate\Database\Seeder;

class InsuranceContractPageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $page = Page::firstOrCreate([
            'controller' => PageController::class,
            'slug' => 'insurance-contract',
            'active' => 1,
        ]);

        $text_uk = <<<EOT
        <p>Договор страхования UK</p>
        EOT;

        $text_ru = <<<EOT
        <p>Договір страхування RU</p>
        EOT;


        PageTranslation::firstOrCreate([
            'page_id' => $page->id,
            'name' => 'Договір страхування',
            'h1' => 'Договір страхування',
            'text' => $text_uk,
            'locale' => 'uk',
        ]);

        PageTranslation::firstOrCreate([
            'page_id' => $page->id,
            'name' => 'Договор страхования',
            'h1' => 'Договор страхования',
            'text' => $text_ru,
            'locale' => 'ru',
        ]);
    }
}
