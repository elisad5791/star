<?php

namespace App\Listeners;

use App\Events\LogFinishEvent;
use App\Models\Log;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class LogFinishListener
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
    public function handle(LogFinishEvent $event): void
    {
        Log::create(['event' => 'LogFinishEvent']);
    }
}
