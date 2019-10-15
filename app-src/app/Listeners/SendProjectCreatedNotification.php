<?php

namespace App\Listeners;

use App\Events\Tutorial\ProjectCreated;
use App\Mail\ProjectCreated as MainProjectCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendProjectCreatedNotification
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param ProjectCreated $event
     * @return void
     */
    public function handle(ProjectCreated $event)
    {
        \Mail::to($event->project->owner->email)->send(
            new MainProjectCreated($event->project)
        );
    }
}
