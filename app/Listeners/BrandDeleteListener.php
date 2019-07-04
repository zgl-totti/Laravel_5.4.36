<?php

namespace App\Listeners;

use App\Events\BrandDeleteEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Storage;

class BrandDeleteListener
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
     * @param  BrandDeleteEvent  $event
     * @return void
     */
    public function handle(BrandDeleteEvent $event)
    {
        if($event->brand->getOriginal('pic')){
            $res=Storage::delete($event->brand->getOriginal('pic'));
        }

        return true;
    }
}
