<?php

namespace App\Listeners;

use App\Events\EventDenegar;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class DenegarListener
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
    public function handle(EventDenegar $event): void
    {
        //
    }
}
