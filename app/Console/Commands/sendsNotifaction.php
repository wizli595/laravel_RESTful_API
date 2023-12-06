<?php

namespace App\Console\Commands;

use App\Models\Event;
use Illuminate\Console\Command;
use Illuminate\Support\Str;

class sendsNotifaction extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:sends-notifaction';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sends notifications to all event atttendes that event starts soon';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info("hhhh");
        // $events = Event::with('attendees.user')
        //     ->whereBetween('start_time', [now(), now()->addDay()])
        //     ->get();
        // $eventCount = $events->count();
        // $eventLbl = Str::plural('event', $eventCount);
        // $this->info("Found {$eventCount} {$eventLbl}");
        // $events->each(
        //     fn ($event) => $event->attendees->each(
        //         fn ($attendee) => $this->info("Notifying the user {$attendee->user->id}")
        //     )
        // );
    }
}
