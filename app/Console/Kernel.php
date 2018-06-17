<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Bill;
class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        'App\Console\Commands\LogStart',
        'App\Console\Commands\LogEnd',
        'App\Console\Commands\Send',
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
//         $schedule->command('inspire')
//                  ->everyFiveMinutes()->appendOutputTo('C:\inspire.txt');
        $schedule->command('log:start')->everyFiveMinutes();
        $schedule->command('log:end')->everyFiveMinutes();
        $schedule->command('log:send')->everyMinute()->when(function()
        {
            return !empty(Bill::pending()->get()->toArray());
        });
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
