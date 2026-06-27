<?php

use App\Http\Controllers\NutritionController;
use Illuminate\Support\Facades\Route;

Route::get('/', [NutritionController::class, 'index'])->name('nutrition.index');
Route::post('/calculate', [NutritionController::class, 'calculate'])->name('nutrition.calculate');