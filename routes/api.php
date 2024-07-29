<?php

use App\Http\Controllers\Web\FeedbackController;
use Illuminate\Support\Facades\Route;

Route::post('/favorite-cars', [FeedbackController::class, 'storeFavorite']);
