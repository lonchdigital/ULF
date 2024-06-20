<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\DynamicPageController;


require __DIR__.'/auth.php';

Route::group([
    'namespace' => 'Web',
//    'middleware' => 'verified'
], function () {

    Route::get('/', [DynamicPageController::class, 'index'])->name('main.page');
    Route::get('/{section}', [DynamicPageController::class, 'section'])->name('section.page');
    Route::get('/{section}/{slug}', [DynamicPageController::class, 'slug'])->name('slug.page');
});

Route::view('404', 'errors.404');
