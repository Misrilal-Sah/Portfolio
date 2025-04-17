<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactFormMail;

class TestMail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mail:test';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Test email configuration';

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
        $this->info('Sending test email...');
        
        $testData = [
            'name' => 'Test User',
            'email' => 'test@example.com',
            'subject' => 'Test Email',
            'message' => 'This is a test email from the Portfolio application.',
        ];

        try {
            $toEmail = env('MAIL_TO_ADDRESS', 'newtestaccount91231236test@mailinator.com');
            Mail::to($toEmail)->send(new ContactFormMail($testData));
            $this->info('Test email sent successfully to: ' . $toEmail);
            return 0;
        } catch (\Exception $e) {
            $this->error('Failed to send test email: ' . $e->getMessage());
            return 1;
        }
    }
} 