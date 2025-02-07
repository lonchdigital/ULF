<?php

use App\Http\Controllers\Web\FeedbackController;
use Illuminate\Support\Facades\Route;
use Modules\Cars\Http\Controllers\Admin\CarsController;

// Route::post('/favorite-cars', [FeedbackController::class, 'storeFavorite']);
// Route::post('/select-cars', [FeedbackController::class, 'storeSelectCar']);


//Route::get('/get-all-cars', [CarsController::class, 'getAllCars'])->name('test.api.all.cars');

Route::middleware('api.auth')->group(function() {
    Route::post('/add-or-update-car', [CarsController::class, 'addOrUpdateCar'])->name('api.add.car');
    Route::post('/remove-car', [CarsController::class, 'removeCar'])->name('api.remove.car');
    Route::post('/update-directories', [CarsController::class, 'updateDirectories'])->name('api.update.directories');
});
