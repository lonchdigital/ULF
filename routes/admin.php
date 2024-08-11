<?php

//use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\AutomatchController;
use App\Http\Controllers\Admin\PageFAQController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\DashboardController;
use Modules\Cars\Http\Controllers\Admin\CarsController;
use App\Http\Controllers\Admin\CarCommonSettingsController;
use Modules\Clients\Http\Controllers\Admin\ClientsController;
use Modules\Articles\app\Http\Controllers\Admin\ArticlesController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "admin" middleware group. Make something great!
|
*/

Route::group([
    'prefix' => 'admin',
    'namespace' => 'Admin'
], function () {
//    Route::get('/login', [AdminAuthController::class, 'getLogin'])->name('adminLogin');
//    Route::post('/login', [AdminAuthController::class, 'postLogin'])->name('adminLoginPost');
//    Route::get('/logout', [AdminAuthController::class, 'adminLogout'])->name('adminLogout');

    Route::group([
//        'middleware' => ['admin_auth']
    ], function () {
        Route::get('/', [DashboardController::class, 'index'])->name('adminDashboard');
        Route::get('/test', [DashboardController::class, 'test'])->name('test');

        Route::prefix('car-common-settings')->group(function () {
            Route::get('edit', [CarCommonSettingsController::class, 'edit'])->name('admin.car-common-settings.edit.page');
            Route::post('edit', [CarCommonSettingsController::class, 'update'])->name('admin.car-common-settings.edit');
        });

        Route::prefix('home-page-settings')->group(function () {
            Route::get('edit', [HomeController::class, 'edit'])->name('admin.home-page-settings.edit.page');
            Route::post('edit', [HomeController::class, 'update'])->name('admin.home-page-settings.edit');
        });


        Route::prefix('articles')->group(function () {
            Route::get('/', [ArticlesController::class, 'index'])->name('article.index');
            Route::get('/create', [ArticlesController::class, 'create'])->name('article.create');
            Route::post('/store', [ArticlesController::class, 'store'])->name('article.store');
            Route::get('/{article}/edit', [ArticlesController::class, 'edit'])->name('article.edit');
            Route::post('/{article}', [ArticlesController::class, 'update'])->name('article.update');
            Route::get('/{article}', [ArticlesController::class, 'destroy'])->name('article.destroy');
        });

        Route::prefix('clients')->group(function () {
            Route::get('/', [ClientsController::class, 'index'])->name('client.index');
            Route::get('/create', [ClientsController::class, 'create'])->name('client.create');
            Route::post('/store', [ClientsController::class, 'store'])->name('client.store');
            Route::get('/{client}/edit', [ClientsController::class, 'edit'])->name('client.edit');
            Route::post('/{client}', [ClientsController::class, 'update'])->name('client.update');
            Route::get('/{client}', [ClientsController::class, 'destroy'])->name('client.destroy');
        });

        Route::prefix('cars')->group(function () {
            Route::get('/', [CarsController::class, 'index'])->name('car.index');
            // Route::get('/create', [ArticlesController::class, 'create'])->name('article.create');
            // Route::post('/store', [ArticlesController::class, 'store'])->name('article.store');
            Route::get('/{car}/edit', [CarsController::class, 'edit'])->name('car.edit');
            Route::post('/{car}', [CarsController::class, 'update'])->name('car.update');
            // Route::get('/{article}', [ArticlesController::class, 'destroy'])->name('article.destroy');

             Route::get('/cars-delete-all', [CarsController::class, 'deleteAllCars'])->name('car.destroy.all');
        });

        Route::prefix('pages')->group(function () {
            Route::get('/', [PageController::class, 'index'])->name('page.index');
            Route::get('/edit-contacts', [PageController::class, 'editContacts'])->name('page.edit-contacts');
            Route::get('/{page}/edit', [PageController::class, 'edit'])->name('page.edit');
            Route::post('/{page}', [PageController::class, 'update'])->name('page.update');
        });

        Route::prefix('/automatch')->name('admin.automatch.')->group(function() {
            Route::get('/', [AutomatchController::class, 'index'])->name('index');
        });

        Route::prefix('/faqs/pages')->name('admin.pages.')->group(function() {
            Route::get('/', [PageFAQController::class, 'index'])->name('index');
            Route::get('/{page}/edit', [PageFAQController::class, 'edit'])->name('edit');

            Route::get('/{page}/create-faq', [PageFAQController::class, 'createFaq'])->name('create-faq');
            Route::get('/{page}/edit-faq/{faq}', [PageFAQController::class, 'editFaq'])->name('edit-faq');
        });

    });

});
