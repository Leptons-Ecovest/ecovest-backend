<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\Models\PaymentPlan;

use App\Models\PaymentSchedule;

use App\Models\User;


use Illuminate\Support\Facades\Http;

class SendReminder extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:reminder';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
     * @return int
     */
    public function handle()
    {

        $response = Http::post(config('app.url').'api/send_reminders');

        return $response;
    }
}
