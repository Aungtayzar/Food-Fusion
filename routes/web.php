<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RecipesController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\CulinaryResourceController;
use Illuminate\Support\Facades\Route;


Route::get('/',[HomeController::class,'index'])->name('home');

Route::resource('/recipes',RecipesController::class)->middleware('auth')->only(['create','edit','destory']);
Route::resource('/recipes',RecipesController::class)->middleware('auth')->except(['create','edit','destory']);


Route::middleware('guest')->group(function(){
    Route::get('/register', [RegisterController::class, 'register'])->name('register');
    Route::post('/register', [RegisterController::class, 'store'])->name('register.store');
    Route::get('/login', [LoginController::class, 'login'])->name('login');
    Route::post('/login', [LoginController::class, 'authenticate'])->name('login.authenticate');
});


Route::post('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');

// Culinary Resources Routes
Route::get('/culinary-resources', [CulinaryResourceController::class, 'index'])->name('culinary-resources.index')->middleware('auth');
Route::get('/culinary-resources/create', [CulinaryResourceController::class, 'create'])->name('culinary-resources.create')->middleware('auth');
Route::post('/culinary-resources', [CulinaryResourceController::class, 'store'])->name('culinary-resources.store')->middleware('auth');
Route::get('/culinary-resources/{resource}/download', [CulinaryResourceController::class, 'download'])->name('culinary-resources.download')->middleware('auth');
