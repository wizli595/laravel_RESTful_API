<?php

namespace Database\Seeders;

use App\Models\Event;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::all();
        // I need 200 event and in the same time bind it to a random user 
        for ($i = 0; $i < 200; $i++) {
            $usr = $users->random();
            //I will create one event with a user ID
            // User should have multiple events  
            Event::factory()->create(['user_id' => $usr->id]);
        }
    }
}
