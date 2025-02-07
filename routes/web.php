<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\RecipesController;
use Illuminate\Support\Facades\Route;


Route::get('/',[HomeController::class,'index'])->name('home');

Route::resource('/recipes',RecipesController::class);

