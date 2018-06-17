<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Bill;
use Illuminate\Support\Facades\URL;

class SendEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $arr = Bill::pending()->get()->toArray();
        $count = Bill::count();
        $date = date('Y-m-d H:i:s');
        for ($i = 0; $i < $count; $i++) {
            if (strtotime($date) - strtotime($arr[$i]['created_at']) >= $arr[$i]['delivery']) {
                $token = $arr[$i]['token'];
                $url =  URL::to('/confirmation/'.$token);
                return $this->view('checkout.email', compact('url'))->to($arr[$i]['email']);
            }else
                continue;
        }

    }
}
