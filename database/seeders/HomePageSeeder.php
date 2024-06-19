<?php

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HomePageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Page::firstOrCreate([
            'controller' => 'App\Http\Controllers\Web\HomeController',
            'pageable_type' => 'App\Http\Controllers\Web\HomeController',
            'action' => 'index',
            'active' => 1,
            'section' => 'main',
            'slug' => '/',
        ]);
    }
}
