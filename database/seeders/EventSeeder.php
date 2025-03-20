<?php

namespace Database\Seeders;

use App\Models\Event;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $events = require database_path('seeders/data/events.php');

        foreach ($events as $event) {
            $event['user_id'] = 1;
            Event::create($event);
        }
    }
}
