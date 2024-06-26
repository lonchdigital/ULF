<?php

namespace Modules\Cars\database\seeders;

use App\Models\Page;
use App\Models\PageTranslation;
use Illuminate\Database\Seeder;
use Modules\Cars\Entities\Car;
use Modules\Cars\Http\Controllers\Web\CarsController;

class CarsPageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $page = Page::firstOrCreate([
            'section' => 'cars',
            'slug' => 'cars',
            'pageable_type' => Car::class,
            'action' => 'index',
            'controller' => CarsController::class,
        ]);

        PageTranslation::firstOrCreate([
            'page_id' => $page->id,
            'name' => 'Авто',
            'h1' => 'Авто',
            'locale' => 'ua',
        ]);

        PageTranslation::firstOrCreate([
            'page_id' => $page->id,
            'name' => 'Авто',
            'h1' => 'Авто',
            'locale' => 'ru',
        ]);

    }

}
