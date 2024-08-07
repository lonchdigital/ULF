<?php

use App\Http\Controllers\Web\PageController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\HomeController;
use App\Http\Controllers\Web\DynamicPageController;
use App\Http\Controllers\Web\FeedbackController;
use Modules\Cars\Http\Controllers\Web\CarsController;
use Modules\Clients\Http\Controllers\Web\ClientsController;
use Modules\Articles\app\Http\Controllers\Web\ArticlesController;


require __DIR__.'/auth.php';

Route::redirect('/dashboard', '/admin');

Route::name('auth.')->prefix('/admin')->group(function () {
    Auth::routes(['register' => false]);
});

Route::post('/feedback/store', [FeedbackController::class, 'store'])->name('feedback.store');

Route::group([
    'namespace' => 'Web',
//    'middleware' => 'verified'
], function () {

    Route::get('/', [HomeController::class, 'index'])->name('main.page');

    Route::get('/thanks', [HomeController::class, 'thanks'])->name('thanks');

    // Blog
    Route::get('/blog', [ArticlesController::class, 'index'])->name('blog.page');
    Route::get('/post/{slug}', [ArticlesController::class, 'show'])->name('blog.single.page');

    // Cars
    Route::get('/catalog', [CarsController::class, 'index'])->name('catalog.page');
    Route::get('/product/{slug}', [CarsController::class, 'show'])->name('car.single.page');

    // Customer stories
    Route::get('/customer-stories', [ClientsController::class, 'index'])->name('clients.page');

    // TODO:: change HomeController to PageController for faq
    Route::get('/faq', [HomeController::class, 'faq'])->name('faq');

    // pages
    // TODO:: change HomeController to PageController for contacts page
    Route::get('/contacts', [HomeController::class, 'contacts'])->name('contacts');
    Route::get('/{slug}', [PageController::class, 'show'])->name('page.single.page');

    Route::get('/faq', [HomeController::class, 'faq'])->name('faq');


    // TODO:: remove DynamicPageController
//    Route::get('/', [DynamicPageController::class, 'index'])->name('main.page');
//    Route::get('/{section}', [DynamicPageController::class, 'section'])->name('section.page');
//    Route::get('/{section}/{slug}', [DynamicPageController::class, 'slug'])->name('slug.page');
});

Route::view('404', 'errors.404');
