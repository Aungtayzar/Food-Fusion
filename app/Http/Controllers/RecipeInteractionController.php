<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use App\Models\RecipeComment;
use App\Models\RecipeFavorite;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class RecipeInteractionController extends Controller
{
    public function addComment(Request $request, Recipe $recipe): RedirectResponse
    {
        $validated = $request->validate([
            'content' => 'required|string|max:1000'
        ]);

        $recipe->comments()->create([
            'content' => $validated['content'],
            'user_id' => auth()->id()
        ]);

        return back()->with('success', 'Comment added successfully!');
    }

    public function toggleFavorite(Recipe $recipe): RedirectResponse
    {
        $favorite = $recipe->favorites()->where('user_id', auth()->id())->first();

        if ($favorite) {
            $favorite->delete();
            $message = 'Recipe removed from favorites';
        } else {
            $recipe->favorites()->create([
                'user_id' => auth()->id()
            ]);
            $message = 'Recipe added to favorites';
        }

        return back()->with('success', $message);
    }
}
