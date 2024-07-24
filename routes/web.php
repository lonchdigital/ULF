<?php

use App\Http\Controllers\Web\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\DynamicPageController;
use Modules\Articles\app\Http\Controllers\Web\ArticlesController;
use Modules\Cars\Http\Controllers\Web\CarsController;


require __DIR__.'/auth.php';

Route::group([
    'namespace' => 'Web',
//    'middleware' => 'verified'
], function () {



    Route::get('/', [HomeController::class, 'index'])->name('main.page');

    // Blog
    Route::get('/blog', [ArticlesController::class, 'index'])->name('blog.page');
    Route::get('/post/{slug}', [ArticlesController::class, 'show'])->name('blog.single.page');

    // Cars
    Route::get('/catalog', [CarsController::class, 'index'])->name('catalog.page');
    Route::get('/product/{slug}', [CarsController::class, 'show'])->name('car.single.page');

    Route::get('/faq', [HomeController::class, 'faq'])->name('faq');


    // TODO:: change routes to more flexible
//    Route::get('/', [DynamicPageController::class, 'index'])->name('main.page');
//    Route::get('/{section}', [DynamicPageController::class, 'section'])->name('section.page');
//    Route::get('/{section}/{slug}', [DynamicPageController::class, 'slug'])->name('slug.page');
});

Route::view('404', 'errors.404');
