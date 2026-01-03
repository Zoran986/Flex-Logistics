<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class TestScheduler extends Command
{
     protected $signature = 'test:scheduler';
    protected $description = 'Test if scheduler is working';

    public function handle()
    {
        $this->info('Scheduler is working! Time: ' . now());
        logger('Scheduler test executed at: ' . now());
        return 0;
    }
}
