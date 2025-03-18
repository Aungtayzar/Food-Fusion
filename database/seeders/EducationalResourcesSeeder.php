<?php

namespace Database\Seeders;

use App\Models\EducationalResource;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EducationalResourcesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $resources = require database_path('seeders/data/educational_resources.php');

        foreach ($resources as $resource) {
            $resource['user_id'] = 1;
            EducationalResource::create($resource);
        }
    }
}
