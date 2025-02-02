<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RecipeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         // Load recipes data
    $recipes = include database_path('seeders/data/recipes.php');

    // Get all user IDs
    $userIds = User::pluck('id')->toArray();

    foreach ($recipes as &$recipe) {
        // Assign a random user_id to each recipes table 
        $recipe['user_id'] = $userIds[array_rand($userIds)];


         // Add timestamps
        $recipe['created_at'] = now();
        $recipe['updated_at'] = now();
    }

    //Hard code cuisine_id to 1
    $recipe['cuisine_id'] = 1;

    

    // Insert Recipes table
    DB::table('recipes')->insert($recipes);
    }
}
