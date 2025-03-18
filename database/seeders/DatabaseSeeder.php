<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::table('users')->truncate();
        DB::table('cuisines')->truncate();
        DB::table('recipes')->truncate();
        DB::table('culinary_resources')->truncate();
        DB::table('recipe_comments')->truncate();
        DB::table('dietary_preferences')->truncate();
        DB::table('recipe_dietary_preferences')->truncate();
        DB::table('contact_us')->truncate();
        DB::table('educational_resources')->truncate();
        
        $this->call(TestUserSeeder::class); 
        $this->call(GuestUserSeeder::class); 
        $this->call(RandomUserSeeder::class);
        $this->call(CuisineSeeder::class);
        $this->call(RecipeSeeder::class);
        $this->call(CulinaryResourcesSeeder::class);
        $this->call(RecipeCommentSeeder::class);
        $this->call(DietaryPreferenceSeeder::class);
        $this->call(RecipeDietaryPreferenceSeeder::class);
        $this->call(MessageSeeder::class);
        $this->call(EducationalResourcesSeeder::class);
    }
}
