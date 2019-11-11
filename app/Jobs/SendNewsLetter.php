<?php

namespace App\Jobs;

use App\Mail\SendMailNewsLetter;
use App\Models\Subscribe;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendNewsLetter implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $subscribers;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->subscribers = Subscribe::take(10)->get();
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        foreach ($this->subscribers as $subscriber) {
            $email = new SendMailNewsLetter();
            Mail::to($subscriber->email)->send($email);
        }
    }
}
