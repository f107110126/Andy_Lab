<?php

namespace App\Listeners;

use App\Events\ProductPurchased;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class AwardAchievement
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
     * @param  ProductPurchased  $event
     * @return void
     */
    public function handle(ProductPurchased $event)
    {
        // $event->user or $event->product
        var_dump('check for new achievements');
    }
}
