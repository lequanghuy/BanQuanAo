<?php

namespace App\Listeners;

use App\Events\CreateEvent;
use App\Product;
use Illuminate\Http\UploadedFile;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\CatergoryDetails;

class InsertEventCode
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
     * @param  CreateEvent $event
     * @return void
     */
    public function handle(CreateEvent $event)
    {
        $data = $event->event->all()->toArray();
        $date = date('Y-m-d');
        $a = CatergoryDetails::allcodes()->toArray();
        $arr = [];
        for ($i = 0; $i < 12; $i++) {
            array_push($arr, $a[$i]['code']);
        }
        for ($i = 0; $i < count($data); $i++) {
            if (strtotime($date) - strtotime($data[$i]['date_start']) >= 0) {
                $target = $data[$i]['target'];
                $bonus = $data[$i]['bonus'];
                $saleup = $data[$i]['saleup'];
                $eventcode = $data[$i]['code'];
                if (in_array($target, $arr)) {
                    if ($bonus == null) {
                        Product::emptyevent()->where('catergorydetails_code', $target)->update(['event_code' => $eventcode, 'saleup' => $saleup]);
                    } else {
                        Product::emptyevent()->filter($bonus)->where('catergorydetails_code', $target)->update(['event_code' => $eventcode, 'saleup' => $saleup]);
                    }
                } else {
                    Product::emptyevent()->filter($target)->update(['event_code' => $eventcode, 'saleup' => $saleup]);
                }
            } else
                continue;
        }
    }
}
