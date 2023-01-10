<?php

namespace App\Console\Commands;
use Mail;
use App\Mail\MailTest;
use App\Http\Controllers\MailController;
use Illuminate\Console\Command;
use App\Http\Controllers\UploadController;

class ScheduleTestCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'schedule:test';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $UploadInstance = new UploadController();
            $UploadInstance->Send_Kro();
            return Command::SUCCESS;

    }

}

