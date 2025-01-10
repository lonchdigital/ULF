<?php

use App\Http\Controllers\Web\FeedbackController;
use Illuminate\Support\Facades\Route;
use Modules\Cars\Http\Controllers\Admin\CarsController;

Route::post('/favorite-cars', [FeedbackController::class, 'storeFavorite']);
Route::post('/select-cars', [FeedbackController::class, 'storeSelectCar']);


//Route::get('/get-all-cars', [CarsController::class, 'getAllCars'])->name('test.api.all.cars');
Route::post('/add-car', [CarsController::class, 'addCar'])->name('api.add.car');
