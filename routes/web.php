<?php

use App\Http\Controllers\Web\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\DynamicPageController;


require __DIR__.'/auth.php';

Route::group([
    'namespace' => 'Web',
//    'middleware' => 'verified'
], function () {



    Route::get('/', [HomeController::class, 'index'])->name('main.page');




    // TODO:: change routes to more flexible
//    Route::get('/', [DynamicPageController::class, 'index'])->name('main.page');
    Route::get('/{section}', [DynamicPageController::class, 'section'])->name('section.page');
    Route::get('/{section}/{slug}', [DynamicPageController::class, 'slug'])->name('slug.page');
});

Route::view('404', 'errors.404');
