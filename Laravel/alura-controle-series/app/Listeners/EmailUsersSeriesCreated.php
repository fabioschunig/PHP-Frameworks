<?php

namespace App\Listeners;

use App\Mail\SeriesCreated;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class EmailUsersSeriesCreated
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(object $event): void
    {
        $userList = User::all();

        foreach ($userList as $index => $user) {
            $email = new SeriesCreated(
                $event->seriesName,
                $event->seriesId,
                $event->seriesSeasonsNumber,
                $event->seriesEpisodesNumber,
            );
            // Mail::to($user)->send($email);
            // Mail::to($user)->queue($email);
            $when = now()->addSeconds($index * 5);
            Mail::to($user)->later($when, $email);
        }

        // to start a queue worker and process new jobs
        // php artisan queue:work
    }
}
