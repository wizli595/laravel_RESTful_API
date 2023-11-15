<?php

namespace Database\Seeders;

use App\Models\Attendee;
use App\Models\Event;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AttendeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::all();
        $events = Event::all();
        foreach ($users as $user) {
            // Select a random number of events for the user to attend (between 1 and 3)
            $eventsToAttendee = $events->random(rand(1, 3));
            foreach ($eventsToAttendee as $event) {
                // Create an Attendee record with user ID and a event ID
                Attendee::create([
                    'user_id' => $user->id,
                    'event_id' => $event->id
                ]);
            }
        }
    }
}
