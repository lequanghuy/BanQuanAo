<?php

namespace App\Listeners;

use App\Event;
use App\Events\EventExpire;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Product;
class DeleteEvent
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
     * @param  EventExpire  $event
     * @return void
     */
    public function handle(EventExpire $event)
    {
        $data = $event->event->all()->toArray();
        $date = date('Y-m-d');
        for($i = 0; $i < count($data); $i++)
        {
            if(strtotime($data[$i]['date_end']) - strtotime($date) <= 0)
            {
                $event_code = $data[$i]['code'];
                Event::eventcode($event_code)->delete();
                Product::where('event_code', $event_code)->update(['event_code' => null, 'saleup' => null]);
            }
            else
                continue;
        }

    }
}
