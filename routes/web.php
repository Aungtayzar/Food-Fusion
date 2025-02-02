<?php

use App\Http\Controllers\RecipesController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::resource('/recipes',RecipesController::class);

