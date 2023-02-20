<?php

namespace App\Console\Commands;

use App\Http\Controllers\ScheduleController;
use Illuminate\Console\Command;
class Schedule extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'run:sensors';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Runs all sensors schedules';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $controller = new ScheduleController();
        $controller->create_data();
    }
}
