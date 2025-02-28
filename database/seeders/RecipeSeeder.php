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

        // Get the ID of the user created by TestUserSeeder
        $testUserId = User::where('email', 'test@test.com')->value('id');

        // Get all other user IDs
        $userIds = User::where('email', '!=', 'test@test.com')->pluck('id')->toArray();

        foreach ($recipes as $index=>&$recipe) {
            if ($index < 2) {
                // Assign the first two recipes listings to the test user
                $recipe['user_id'] = $testUserId;
            } else {
                // Assign the rest to random users
                $recipe['user_id'] = $userIds[array_rand($userIds)];
            }


            // Add timestamps
            $recipe['created_at'] = now();
            $recipe['updated_at'] = now();
        }


    

        // Insert Recipes table
        DB::table('recipes')->insert($recipes);
    }
}
