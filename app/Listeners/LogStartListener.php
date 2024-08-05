<?php

namespace App\Listeners;

use App\Events\LogStartEvent;
use App\Models\Log;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class LogStartListener
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
    public function handle(LogStartEvent $event): void
    {
        Log::create(['event' => 'LogStartEvent']);
    }
}
