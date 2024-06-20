<?php

namespace App\Listeners;

use App\Events\SeriesCreatedEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class LogSeriesCreated
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
    public function handle(SeriesCreatedEvent $event): void
    {
        Log::info("Série {$event->seriesName} criada com sucesso");
    }
}
