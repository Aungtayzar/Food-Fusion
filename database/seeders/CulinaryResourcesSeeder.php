<?php

namespace Database\Seeders;

use App\Models\CulinaryResource;
use Illuminate\Database\Seeder;

class CulinaryResourcesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $resources = require database_path('seeders/data/culinary_resources.php');

        foreach ($resources as $resource) {
            CulinaryResource::create($resource);
        }
    }
}
