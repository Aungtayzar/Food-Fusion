<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RecipeDietaryPreferenceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         // Load dietary preferences data
         $recipe_dietary_preferences = include database_path('seeders/data/recipe_dietary_preference.php');

         foreach ($recipe_dietary_preferences as &$recipe_dietary_preference) {    
     
              // Add timestamps
             $recipe_dietary_preference['created_at'] = now();
             $recipe_dietary_preference['updated_at'] = now();
         }
 
         // Insert dietary_preferences table
         DB::table('recipe_dietary_preferences')->insert($recipe_dietary_preferences);
    }
}
