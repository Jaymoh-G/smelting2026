<?php

namespace App\Console\Commands;

use App\Mail\TestMail;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class sendCertificateEmail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:certificateEmail';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sends Event certificates to participants';

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
        $email = "kyalomajor@gmail.com";   
        Mail::to($email)->send(new TestMail());

    }
}
