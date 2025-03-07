<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use App\Models\RecipeFavorite;
use Illuminate\Http\Request;
use Illuminate\View\View;

class FavouriteRecipeController extends Controller
{
     // @desc   Show all the favourite recipes
    // @route  GET/favouriterecipes
    public function index():View
    {
        $user = auth()->user();
        $favouriteRecipes = Recipe::whereIn('id', $user->favorites()->pluck('recipe_id'))->get();
        
        return view('favourite-recipes.index', compact('favouriteRecipes'));
    }
}
