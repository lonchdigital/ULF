<?php

//use App\Http\Controllers\Admin\AdminAuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CarCommonSettingsController;
use Modules\Articles\Http\Controllers\Admin\ArticlesController;

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

        Route::prefix('car-common-settings')->group(function () {
            Route::get('edit', [CarCommonSettingsController::class, 'edit'])->name('admin.car-common-settings.edit.page');
            Route::post('edit', [CarCommonSettingsController::class, 'update'])->name('admin.car-common-settings.edit');

            Route::get('one-car', [CarCommonSettingsController::class, 'oneCar'])->name('admin.one.car.page');
        });


        Route::prefix('articles')->group(function () {
            Route::get('/', [ArticlesController::class, 'index'])->name('article.index');
            Route::get('/create', [ArticlesController::class, 'create'])->name('article.create');
        });

    });

});
