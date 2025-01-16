<?php

namespace Database\Seeders;

use App\Models\Page;
use App\Models\PageBlock;
use App\Models\PageTranslation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Modules\Clients\Http\Controllers\Web\ClientsController;

class HeaderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Page::firstOrCreate([
            'controller' => 'App\Http\Controllers\Web\HomeController',
            'active' => 1,
            'slug' => 'header',
        ]);
    }
}
