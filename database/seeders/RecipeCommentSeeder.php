<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Recipe;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RecipeCommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Load recipe comment data
        $recipe_comments = include database_path('seeders/data/recipe_comments.php');

        // Get available user IDs
        $userIDs = User::pluck('id')->toArray();
        
        // Get available recipe IDs
        $recipeIDs = Recipe::pluck('id')->toArray();

        foreach ($recipe_comments as &$recipe_comment) {

                $recipe_comment['user_id'] = $userIDs[array_rand($userIDs)] ;
                $recipe_comment['recipe_id'] = $recipeIDs[array_rand($recipeIDs)] ;
               
                // Add timestamps
                $recipe_comment['created_at'] = now();
                $recipe_comment['updated_at'] = now();
        
        }

        // Insert into recipe_comments table
        DB::table('recipe_comments')->insert($recipe_comments);
    }
}
