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
        
        $this->call(RandomUserSeeder::class);
        $this->call(CuisineSeeder::class);
        $this->call(RecipeSeeder::class);

        
    }
}
