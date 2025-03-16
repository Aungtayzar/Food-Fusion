<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         // Load message data
         $messages = include database_path('seeders/data/messages.php');

         // Get all other user IDs
        $userIds = User::where('email', '!=', 'test@test.com')->pluck('id')->toArray();

        foreach ($messages as &$message) {
            
            // Assign the random users
            $message['user_id'] = $userIds[array_rand($userIds)];
            // Add timestamps
            $message['created_at'] = now();
            $message['updated_at'] = now();
        }

        // Insert Recipes table
        DB::table('contact_us')->insert($messages);
    }
}
