<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DietaryPreferenceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Load dietary preferences data
        $dietary_preferences = include database_path('seeders/data/dietary_preference.php');

        foreach ($dietary_preferences as &$dietary_preference) {    
    
             // Add timestamps
            $dietary_preference['created_at'] = now();
            $dietary_preference['updated_at'] = now();
        }

        // Insert dietary_preferences table
        DB::table('dietary_preferences')->insert($dietary_preferences);
    }
}
