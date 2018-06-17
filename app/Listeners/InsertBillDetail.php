<?php

namespace App\Listeners;

use App\Events\InsertBill;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Billdetail;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class InsertBillDetail
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
     * @param  InsertBill  $event
     * @return void
     */
    public function handle(InsertBill $event)
    {
        $content = Cart::instance(auth()->user()->id)->content();
        $maxid = $event->bill->maxid()->toArray();
        $dataset = [];
        foreach ($content as $data)
            {
                $dataset[] = [
                  'bill_id' => $maxid[0]['bill_id'],
                    'image' => $data->options->img,
                    'name' => $data->name,
                    'product_qty' => $data->qty,
                    'price' => $data->price,
                    'created_at' => Carbon::now(new \DateTimeZone('Asia/Ho_Chi_Minh')),
                    'updated_at' => Carbon::now(new \DateTimeZone('Asia/Ho_Chi_Minh'))
                ];
            }
        DB::table('billdetails')->insert($dataset);
    }
}
