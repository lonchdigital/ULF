<?php

namespace Database\Seeders;

use App\Models\Page;
use App\Models\PageBlock;
use App\Models\PageTranslation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Modules\Clients\Http\Controllers\Web\ClientsController;

class PagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $customerStoriesPage = Page::firstOrCreate([
            'controller' => ClientsController::class,
            'slug' => 'customer-stories',
            'key' => 'customer-stories',
            'active' => 1,
        ]);
        PageTranslation::firstOrCreate([
            'page_id' => $customerStoriesPage->id,
            'name' => 'Історії клієнтів',
            'h1' => 'Історії клієнтів',
            'locale' => 'uk',
        ]);
        PageTranslation::firstOrCreate([
            'page_id' => $customerStoriesPage->id,
            'name' => 'Истории клиентов',
            'h1' => 'Истории клиентов',
            'locale' => 'ru',
        ]);

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

        // $page3 = Page::firstOrCreate([
        //     'controller' => 'App\Http\Controllers\Web\HomeController',
        //     'active' => 1,
        //     'slug' => 'header',
        // ]);

        // $block8 = PageBlock::firstOrCreate([
        //     'page_id' => $page3->id,
        //     'block' => 'menu',
        //     'key' => 'logo',
        // ]);

        // $block8->translateOrNew('uk')->description = '';
        // $block8->translateOrNew('ru')->description = '';

        // $block8->save();

        // $block9 = PageBlock::firstOrCreate([
        //     'page_id' => $page3->id,
        //     'block' => 'menu',
        //     'key' => 'button',
        // ]);

        // $block9->translateOrNew('uk')->title = 'Передзвоніть мені';
        // $block9->translateOrNew('ru')->title = 'Перезвоните мне';

        // $block9->save();

        $page4 = Page::firstOrCreate([
            'controller' => 'App\Http\Controllers\Web\HomeController',
            'active' => 1,
            'slug' => 'footer',
        ]);

        $block10 = PageBlock::firstOrCreate([
            'page_id' => $page4->id,
            'block' => 'footer',
            'key' => 'description',
        ]);

        $block10->translateOrNew('uk')->description = 'Новий гнучкий спосіб володіти автомобілем. За фіксовану місячну плату ви отримуєте автомобіль з повним технічним забезпеченням, страхуванням і цілодобовою підтримкою.';
        $block10->translateOrNew('ru')->description = 'Новый гибкий способ владеть автомобилем. За фиксированную месячную плату вы получаете автомобиль с полным техническим обеспечением, страхованием и круглосуточной поддержкой.';

        $block10->save();

        $block11 = PageBlock::firstOrCreate([
            'page_id' => $page4->id,
            'block' => 'footer',
            'key' => 'communicate_telegram',
        ]);

        $block11->translateOrNew('uk')->description = '';

        $block11->save();

        $block12 = PageBlock::firstOrCreate([
            'page_id' => $page4->id,
            'block' => 'footer',
            'key' => 'communicate_viber',
        ]);

        $block12->translateOrNew('uk')->description = '';

        $block12->save();

        $block13 = PageBlock::firstOrCreate([
            'page_id' => $page4->id,
            'block' => 'footer',
            'key' => 'bot_viber',
        ]);

        $block13->translateOrNew('uk')->description = '';

        $block13->save();

        $block14 = PageBlock::firstOrCreate([
            'page_id' => $page4->id,
            'block' => 'footer',
            'key' => 'bot_telegram',
        ]);

        $block14->translateOrNew('uk')->description = '';

        $block14->save();

        $block15 = PageBlock::firstOrCreate([
            'page_id' => $page4->id,
            'block' => 'footer',
            'key' => 'email',
        ]);

        $block15->translateOrNew('uk')->description = '';

        $block15->save();

        $block16 = PageBlock::firstOrCreate([
            'page_id' => $page4->id,
            'block' => 'phone',
            'key' => 'phone1',
        ]);

        $block16->translateOrNew('uk')->title = '0 800 331 001';

        $block16->translateOrNew('uk')->description = '';

        $block16->save();

        $block17 = PageBlock::firstOrCreate([
            'page_id' => $page4->id,
            'block' => 'phone',
            'key' => 'phone2',
        ]);

        $block17->translateOrNew('uk')->title = '+380 67 236 62 63';

        $block17->translateOrNew('uk')->description = 'для дзвінків з-за кордону';

        $block17->save();

        $block18 = PageBlock::firstOrCreate([
            'page_id' => $page4->id,
            'block' => 'footer',
            'key' => 'instagram',
        ]);

        $block18->translateOrNew('uk')->description = '';
        $block18->translateOrNew('ru')->description = '';

        $block18->save();

        $block19 = PageBlock::firstOrCreate([
            'page_id' => $page4->id,
            'block' => 'footer',
            'key' => 'tik_tok',
        ]);

        $block19->translateOrNew('uk')->description = '';
        $block19->translateOrNew('ru')->description = '';

        $block19->save();

        $block20 = PageBlock::firstOrCreate([
            'page_id' => $page4->id,
            'block' => 'footer',
            'key' => 'facebook',
        ]);

        $block20->translateOrNew('uk')->description = '';
        $block20->translateOrNew('ru')->description = '';

        $block20->save();

        $block21 = PageBlock::firstOrCreate([
            'page_id' => $page4->id,
            'block' => 'footer',
            'key' => 'youtube',
        ]);

        $block21->translateOrNew('uk')->description = '';
        $block21->translateOrNew('ru')->description = '';

        $block21->save();

        $block22 = PageBlock::firstOrCreate([
            'page_id' => $page4->id,
            'block' => 'footer',
            'key' => 'linkedin',
        ]);

        $block22->translateOrNew('uk')->description = '';
        $block22->translateOrNew('ru')->description = '';

        $block22->save();

        $page5 = Page::firstOrCreate([
            'controller' => 'App\Http\Controllers\Web\HomeController',
            'key' => null,
            'active' => 1,
            'slug' => 'catalog',
        ]);

        PageTranslation::firstOrCreate([
            'page_id' => $page5->id,
            'name' => 'Автопарк',
            'h1' => 'Автопарк',
            'text' => null,
            'locale' => 'uk',
        ]);

        PageTranslation::firstOrCreate([
            'page_id' => $page5->id,
            'name' => 'Автопарк',
            'h1' => 'Автопарк',
            'text' => null,
            'locale' => 'ru',
        ]);

        $page6 = Page::firstOrCreate([
            'controller' => 'App\Http\Controllers\Web\HomeController',
            'key' => null,
            'active' => 1,
            'slug' => 'customer-stories',
        ]);

        PageTranslation::firstOrCreate([
            'page_id' => $page6->id,
            'name' => 'Історії клієнтів',
            'h1' => 'Історії клієнтів',
            'text' => null,
            'locale' => 'uk',
        ]);

        PageTranslation::firstOrCreate([
            'page_id' => $page6->id,
            'name' => 'Истории клиентов',
            'h1' => 'Истории клиентов',
            'text' => null,
            'locale' => 'ru',
        ]);

        $page7 = Page::firstOrCreate([
            'controller' => 'App\Http\Controllers\Web\HomeController',
            'key' => null,
            'active' => 1,
            'slug' => 'blog',
        ]);

        PageTranslation::firstOrCreate([
            'page_id' => $page7->id,
            'name' => 'Блог',
            'h1' => 'Блог',
            'text' => null,
            'locale' => 'uk',
        ]);

        PageTranslation::firstOrCreate([
            'page_id' => $page7->id,
            'name' => 'Блог',
            'h1' => 'Блог',
            'text' => null,
            'locale' => 'ru',
        ]);
    }
}
