<?php

namespace App\Console\Commands;

use App\Events\EventExpire;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use App\Event;

class LogEnd extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'log:end';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete end event';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $event = new Event();
        event(new EventExpire($event));
    }
}
