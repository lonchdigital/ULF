<?php

namespace Database\Seeders;

use App\Models\Page;
use App\Models\PageBlock;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $page = Page::firstOrCreate([
            'controller' => 'App\Http\Controllers\Web\HomeController',
            'key' => 'faq',
            'active' => 1,
            'slug' => 'faq',
        ]);

        $page2 = Page::firstOrCreate([
            'controller' => 'App\Http\Controllers\Web\HomeController',
            'active' => 1,
            'slug' => 'contacts',
        ]);

        $page2->translateOrNew('uk')->name = 'Контакти';
        $page2->translateOrNew('uk')->h1 = 'Контакти';
        $page2->translateOrNew('ru')->name = 'Контакты';
        $page2->translateOrNew('ru')->h1 = 'Контакты';

        $page2->save();

        $block = PageBlock::firstOrCreate([
            'page_id' => $page2->id,
            'block' => 'days',
            'key' => 'first',
        ]);

        $block->translateOrNew('uk')->title = 'Пн - Пт';
        $block->translateOrNew('uk')->description = '9:00 - 18:00';
        $block->translateOrNew('ru')->title = 'Пн - Пт';
        $block->translateOrNew('ru')->description = '9:00 - 18:00';

        $block->save();

        $block2 = PageBlock::firstOrCreate([
            'page_id' => $page2->id,
            'block' => 'days',
            'key' => 'second',
        ]);

        $block2->translateOrNew('uk')->title = 'Сб - Нд';
        $block2->translateOrNew('uk')->description = 'Вихідний';
        $block2->translateOrNew('ru')->title = 'Сб - Нд';
        $block2->translateOrNew('ru')->description = 'Виходной';

        $block2->save();

        $block3 = PageBlock::firstOrCreate([
            'page_id' => $page2->id,
            'block' => 'address',
            'key' => 'text',
        ]);

        $block3->translateOrNew('uk')->title = 'Україна, 03150';
        $block3->translateOrNew('uk')->description = 'м. Київ, Оболонський проспект, 35-А, офіс 300';
        $block3->translateOrNew('ru')->title = 'Україна, 03150';
        $block3->translateOrNew('ru')->description = 'м. Київ, Оболонський проспект, 35-А, офіс 300';

        $block3->save();

        $block4 = PageBlock::firstOrCreate([
            'page_id' => $page2->id,
            'block' => 'phone',
            'key' => 'text',
        ]);

        $block4->translateOrNew('uk')->title = '0 800 331 001';
        $block4->translateOrNew('uk')->description = '+380 67 236 62 63';
        $block4->translateOrNew('ru')->title = '0 800 331 001';
        $block4->translateOrNew('ru')->description = '+380 67 236 62 63';

        $block4->save();

        $block5 = PageBlock::firstOrCreate([
            'page_id' => $page2->id,
            'block' => 'email',
            'key' => 'text',
        ]);

        $block5->translateOrNew('uk')->title = 'auto.online@ulf.ua';
        $block5->translateOrNew('ru')->title = 'auto.online@ulf.ua';

        $block5->save();

        $block6 = PageBlock::firstOrCreate([
            'page_id' => $page2->id,
            'block' => 'instagram',
            'key' => 'text',
        ]);

        $block6->translateOrNew('uk')->title = 'instagram.com';
        $block6->translateOrNew('ru')->title = 'instagram.com';

        $block6->save();

        $block7 = PageBlock::firstOrCreate([
            'page_id' => $page2->id,
            'block' => 'facebook',
            'key' => 'text',
        ]);

        $block7->translateOrNew('uk')->title = 'facebook.com';
        $block7->translateOrNew('ru')->title = 'facebook.com';

        $block7->save();
    }
}
