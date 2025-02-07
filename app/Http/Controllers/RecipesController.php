<?php

namespace App\Http\Controllers;

use App\Models\Cuisine;
use App\Models\Recipe;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
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
        $cuisines = Cuisine::orderBy('name','asc')->get()->pluck('name','id');
        return view('recipes.create')->with('cuisines',$cuisines);
    }

    // @desc   Store a new recipe
    // @route  POST /recipes
    public function store(Request $request):RedirectResponse//RedirectResponse
    {
        $validateddata = $request->validate([
            'image'=>'nullable|image|mimes:jpeg,jpg,png,gif|max:2048',
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
        

        //Check for image
        if($request->hasFile('image')){

            //Store file and get path
            $path = $request->file('image')->store('recipelogos','public');

            // send image path to database 
            $validateddata['image'] = $path;
        }

        Recipe::create($validateddata);

        return redirect()->route('recipes.index')->with('success','New Recipe successfully create');
        
    }

    // @desc   Show all the recipes
    // @route  GET/recipes/{recipe}
    public function show(Recipe $recipe):View
    {   
        return view('recipes.show')->with('recipe',$recipe);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Recipe $recipe):View
    {
        $cuisines = Cuisine::orderBy('name','asc')->get()->pluck('name','id');
        return view('recipes.edit')->with('cuisines',$cuisines)->with('recipe',$recipe);
    }

    // @desc   Update a  recipe
    // @route  PUT /recipes/{recipe}
    public function update(Request $request, Recipe $recipe):RedirectResponse
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
        

         //Check for image
         if($request->hasFile('image')){

            //Delete old logo
            Storage::delete('public/recipelogos/' . basename($recipe->image));

            //Store file and get path
            $path = $request->file('image')->store('recipelogos','public');

            // send image path to database 
            $validateData['image'] = $path;
        }

        Recipe::create($validateddata);

        return redirect()->route('recipes.index')->with('success','Update Recipe successfully');
    }

    // @desc   delete a  recipe
    // @route  DESTORY /recipes/{recipe}
    public function destroy(Recipe $recipe):RedirectResponse
    {

        //if logo then delete it 
        if($recipe->image){
            Storage::delete('public/recipelogos/' . $recipe->image);
        }

        $recipe->delete();
        return redirect()->route('recipes.index')->with('success','Delete Recipe successfully');
    }
}
