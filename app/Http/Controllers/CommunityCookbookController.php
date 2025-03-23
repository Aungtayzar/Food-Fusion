<?php

namespace App\Http\Controllers;
use App\Models\Recipe;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CommunityCookbookController extends Controller
{
    // @desc   Show all Recipes
    // @route  GET /communitycookbooks
    public function index():View
    {
        $recipes = Recipe::with('user')->paginate(9);
        return view('community-cookbook.index',compact('recipes'));
    }
}
