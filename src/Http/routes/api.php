<?php

use Illuminate\Support\Facades\Route;
use Mbsoft31\LaravelReviews\Http\Controllers\Api\ReviewController;

Route::apiResource('reviews', ReviewController::class);
