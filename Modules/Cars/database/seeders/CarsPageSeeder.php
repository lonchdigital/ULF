<?php

namespace Modules\Cars\database\seeders;

use Illuminate\Database\Seeder;
use Modules\Cars\Http\Controllers\Web\CarsController;
use Modules\Cars\Models\CarPage;
use Modules\Cars\Models\CarPageTranslation;

class CarsPageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $page = CarPage::firstOrCreate([
            'section' => 'cars',
            'slug' => 'cars',
            'action' => 'index',
            'controller' => CarsController::class,
        ]);

        CarPageTranslation::firstOrCreate([
            'car_page_id' => $page->id,
            'name' => 'Авто',
            'h1' => 'Авто',
            'locale' => 'uk',
        ]);

        CarPageTranslation::firstOrCreate([
            'car_page_id' => $page->id,
            'name' => 'Авто',
            'h1' => 'Авто',
            'locale' => 'ru',
        ]);

    }

}
