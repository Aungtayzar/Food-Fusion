<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RecipesController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\CulinaryResourceController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FavouriteRecipeController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RecipeInteractionController;
use Illuminate\Support\Facades\Route;


Route::get('/',[HomeController::class,'index'])->name('home');
//Dashboard Routes
Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard')->middleware('auth');

//Profile
Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update')->middleware('auth');

//Favourit Recipes Route
Route::get('/favouriterecipes', [FavouriteRecipeController::class, 'index'])->name('favouriterecipes.index')->middleware('auth');

//recipes Routes
Route::get('/recipes/search', [RecipesController::class, 'search'])->name('recipes.search')->middleware('auth');
Route::resource('/recipes',RecipesController::class)->middleware('auth')->only(['create','edit','destory']);
Route::resource('/recipes',RecipesController::class)->middleware('auth')->except(['create','edit','destory']);

// Recipe interactions
Route::middleware(['auth'])->group(function () {
    Route::post('/recipes/{recipe}/comments', [RecipeInteractionController::class, 'addComment'])->name('recipes.comments.add');
    Route::post('/recipes/{recipe}/favorite', [RecipeInteractionController::class, 'toggleFavorite'])->name('recipes.favorite.toggle');
});

Route::middleware('guest')->group(function(){
    //login and reigster Routes
    Route::get('/register', [RegisterController::class, 'register'])->name('register');
    Route::post('/register', [RegisterController::class, 'store'])->name('register.store');
    Route::get('/login', [LoginController::class, 'login'])->name('login');
    Route::post('/login', [LoginController::class, 'authenticate'])->name('login.authenticate');
    
    //Reset Password Routes
    Route::get('/forgot-password',[ForgotPasswordController::class,'request'])->name('password.request');
    Route::post('/forgot-password',[ForgotPasswordController::class,'passwordEmail'])->name('password.email');
    Route::get('/reset-password/{token}', [ForgotPasswordController::class,'passwordReset'])->name('password.reset');
    Route::post('/reset-password',[ForgotPasswordController::class,'passwordUpdate'])->name('password.update');

});

//logout Route
Route::post('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');

Route::middleware('auth')->group(function(){

    // Culinary Resources Routes
    Route::get('/culinary-resources', [CulinaryResourceController::class, 'index'])->name('culinary-resources.index');
    Route::get('/culinary-resources/create', [CulinaryResourceController::class, 'create'])->name('culinary-resources.create');
    Route::post('/culinary-resources', [CulinaryResourceController::class, 'store'])->name('culinary-resources.store');
    Route::get('/culinary-resources/{resource}/download', [CulinaryResourceController::class, 'download'])->name('culinary-resources.download');
});
