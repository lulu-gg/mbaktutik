<?php

namespace App\Jobs;

use App\Mail\BroadcastMail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendBroadcastMailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    private $receivers;
    private $subject;
    private $message;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($receivers, $subject, $message)
    {
        $this->receivers = $receivers;
        $this->subject = $subject;
        $this->message = $message;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        foreach ($this->receivers as $email) {
            Mail::to($email)->send(new BroadcastMail($this->subject, $this->message));
        }
    }
}
