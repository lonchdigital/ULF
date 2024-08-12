<?php

use App\Http\Controllers\Web\FeedbackController;
use Illuminate\Support\Facades\Route;
use Modules\Cars\Http\Controllers\Admin\CarsController;

Route::post('/favorite-cars', [FeedbackController::class, 'storeFavorite']);


Route::get('/get-all-cars', [CarsController::class, 'getAllCars'])->name('test.api.all.cars');
/*Route::prefix('/test/api')->group(function () {
    Route::get('/getAllCars', [CarsController::class, 'getAllCars'])->name('test.api.all.cars');
});*/
