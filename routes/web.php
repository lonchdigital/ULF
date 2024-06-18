<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\DynamicPageController;



/*Route::get('/car', function () {
    return view('web.car.show');
});*/


Route::group([
    'namespace' => 'Web',
//    'middleware' => 'verified'
], function () {

    Route::get('/', [DynamicPageController::class, 'index'])->name('main.page');
//    Route::get('/{section}', [DynamicPageController::class, 'section'])->name('section.page');
    Route::get('/{section}/{slug}', [DynamicPageController::class, 'slug'])->name('slug.page');
});

Route::view('404', 'errors.404');
