<?php

namespace App\Http\Controllers;

use App\Models\Cuisine;
use App\Models\DietaryPreference;
use App\Models\Recipe;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class RecipesController extends Controller
{
    use AuthorizesRequests;
    // @desc   Show all the recipes
    // @route  GET/recipes
    public function index():View
    {
        $query = Recipe::query();

        // Filter by cuisine
        if (request('cuisine')) {
            $query->where('cuisine_id', request('cuisine'));
        }

        // Sort order
        if (request('sort') === 'oldest') {
            $query->oldest();
        } else {
            $query->latest();
        }

        // Filter by dietary preference
        if (request('dietary_preference')) {
            $query->whereHas('dietaryPreferences', function($q) {
                $q->where('dietary_preference_id', request('dietary_preference'));
            });
        }

        $dietaryPreferences = DietaryPreference::orderBy('name')->get()->pluck('name','id')->toArray();
        $recipes = $query->paginate(9)->withQueryString();
        $cuisines = Cuisine::orderBy('name')->get()->pluck('name','id')->toArray();
        return view('recipes.index', compact('recipes', 'cuisines','dietaryPreferences'));
    }

    // @desc   Show Create recipes Form
    // @route  GET /recipes
    public function create() : View
    {
        $dietaryPreferences = DietaryPreference::orderBy('name')->get()->pluck('name','id')->toArray();
        $cuisines = Cuisine::orderBy('name','asc')->get()->pluck('name','id');
        return view('recipes.create')->with('cuisines',$cuisines)->with('dietaryPreferences',$dietaryPreferences);
    }

    // @desc   Store a new recipe
    // @route  POST /recipes
    public function store(Request $request):RedirectResponse
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
            'cooking_tips'=>'nullable|string',
            'personal_notes'=>'nullable|string',
            'cuisine_id'=>'required|string',
            'dietary_preferences' => 'nullable|array',
            'dietary_preferences.*' => 'exists:dietary_preferences,id'
        ]);
        
        $validateddata['user_id'] = auth()->user()->id;
        
        //Check for image
        if($request->hasFile('image')){
            //Store file and get path
            $path = $request->file('image')->store('recipelogos','public');
            // send image path to database 
            $validateddata['image'] = $path;
        }

        // Create the recipe
        $recipe = Recipe::create($validateddata);

        // Attach dietary preferences if any were selected
        if ($request->has('dietary_preferences')) {
            $recipe->dietaryPreferences()->attach($request->dietary_preferences);
        }

        return redirect()->route('recipes.index')->with('success','New Recipe successfully created');
    }

    // @desc   Show recipe detail
    // @route  GET/recipes/{recipe}
    public function show(Recipe $recipe):View
    {   
        return view('recipes.show')->with('recipe',$recipe);
    }

    // @desc   Show recipe Form
    // @route  GET/recipes/{recipe}
    public function edit(Recipe $recipe):View
    {
        // Check if the user is authorized
        $this->authorize('update', $recipe);
        $dietaryPreferences = DietaryPreference::orderBy('name')->get()->pluck('name','id')->toArray();
        $cuisines = Cuisine::orderBy('name','asc')->get()->pluck('name','id');
        return view('recipes.edit')->with('cuisines',$cuisines)->with('recipe',$recipe)->with('dietaryPreferences',$dietaryPreferences);
    }

    // @desc   Update a  recipe
    // @route  PUT /recipes/{recipe}
    public function update(Request $request, Recipe $recipe):RedirectResponse
    {
        // Check if the user is authorized
        $this->authorize('update', $recipe);
        $validateddata = $request->validate([
            'image'=>'nullable|image|mimes:jpg,png,jpeg|max:2048',
            'title'=>'required|string|max:255',
            'description'=>'required|string|max:255',
            'ingredients'=>'required|string|max:255',
            'instructions'=>'required|string|max:255',
            'preparation_time'=>'required|integer',
            'cooking_time'=>'required|integer',
            'difficulty_level'=>'required|string',
            'cuisine_id'=>'required|string',
            'dietary_preferences' => 'nullable|array',
            'dietary_preferences.*' => 'exists:dietary_preferences,id'
        ]);

        //Hard code user id
        $validateddata['user_id'] = auth()->user()->id;
        
        //Check for image
        if($request->hasFile('image')){
            //Delete old logo
            Storage::delete('public/recipelogos/' . basename($recipe->image));
            //Store file and get path
            $path = $request->file('image')->store('recipelogos','public');
            // send image path to database 
            $validateddata['image'] = $path;
        }

        // Update the recipe
        $recipe->update($validateddata);

        // Sync dietary preferences
        $recipe->dietaryPreferences()->sync($request->dietary_preferences ?? []);

        return redirect()->route('recipes.index')->with('success','Update Recipe successfully');
    }

    // @desc   delete a  recipe
    // @route  DELETE /recipes/{recipe}
    public function destroy(Recipe $recipe):RedirectResponse
    {
        // Check if the user is authorized
        $this->authorize('delete', $recipe);

        //if logo then delete it 
        if($recipe->image){
            Storage::delete('public/recipelogos/' . $recipe->image);
        }

        $recipe->delete();
        return redirect()->route('recipes.index')->with('success','Delete Recipe successfully');
    }

    // @desc   Search recipes
    // @route  GET /recipes/search
    public function search(Request $request): View
    {
        $search = $request->input('search');
        
        $recipes = Recipe::query()
            ->where('title', 'LIKE', "%{$search}%")
            ->orWhere('description', 'LIKE', "%{$search}%")
            ->orWhere('ingredients', 'LIKE', "%{$search}%")
            ->latest()
            ->paginate(9);
        
        // Add to provide the variables for the filters
        $dietaryPreferences = DietaryPreference::orderBy('name')->get()->pluck('name','id')->toArray();
        $cuisines = Cuisine::orderBy('name')->get()->pluck('name','id')->toArray();
            
        return view('recipes.index', compact('recipes', 'cuisines', 'dietaryPreferences'));
    }

    // @desc   Search recipes
    // @route  GET /dashboardmyrecipes
    public function myrecipes(): View
    {
        $adminrecipes = Recipe::paginate(9);
        $recipes = auth()->user()->recipes()->latest()->paginate(9);
        return view('dashboard.myrecipes', compact('recipes','adminrecipes'));
    }

}
