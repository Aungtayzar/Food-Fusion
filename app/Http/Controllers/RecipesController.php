<?php

namespace App\Http\Controllers;

use App\Models\Cuisine;
use App\Models\Recipe;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class RecipesController extends Controller
{
    // @desc   Show all the recipes
    // @route  GET/recipes
    public function index():View
    {
        $recipes = Recipe::all();
        return view('recipes.index',compact('recipes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() : View
    {
        $recipes = Recipe::pluck('cuisine_id');
        $cuisines = Cuisine::orderBy('name','asc')->get()->pluck('name','id');
        return view('recipes.create')->with('cuisines',$cuisines)->with('recipes',$recipes);
    }

    // @desc   Store a new recipe
    // @route  POST /recipes
    public function store(Request $request)//RedirectResponse
    {
        $validateddata = $request->validate([
            'image'=>'nullable|image|mimes:jpg,png,jpeg|max:2048',
            'title'=>'required|string|max:255',
            'description'=>'required|string|max:255',
            'ingredients'=>'required|string|max:255',
            'instructions'=>'required|string|max:255',
            'preparation_time'=>'required|integer',
            'cooking_time'=>'required|integer',
            'difficulty_level'=>'required|string',
            'cuisine_id'=>'required|string'

        ]);
        
        //Hard code user id
        $validateddata['user_id'] = 1;
        Recipe::create($validateddata);

        return redirect()->route('recipes.index')->with('success','New Recipe successfully create');
        
    }

    // @desc   Show all the recipes
    // @route  GET/recipes/{recipe}
    public function show(Recipe $recipe)
    {   
        return view('recipes.show')->with('recipe',$recipe);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
