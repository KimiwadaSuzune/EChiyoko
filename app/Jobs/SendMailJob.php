<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use App\Mail\HiyokoMail;

class SendMailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $user;
    public $product;
    /**
     * Create a new job instance.
     */
    public function __construct($user,$product)
    {
        $this->user = $user;
        $this->product = $product;

        // dd($this->user,$this->product);

    }

    /**
     * Execute the job.
     */

    public function handle(): void
    {
        // dd($this->user,$this->product);
        Mail::to('test@example.com')->send(new HiyokoMail($this->user,$this->product));
    }
}
