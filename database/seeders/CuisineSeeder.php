<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CuisineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Load Cuisines data
        $cuisines = include database_path('seeders/data/cuisines.php');

        foreach ($cuisines as &$cuisine) {    
    
             // Add timestamps
            $cuisine['created_at'] = now();
            $cuisine['updated_at'] = now();
        }

        // Insert Cuisines table
        DB::table('cuisines')->insert($cuisines);

    }
}
