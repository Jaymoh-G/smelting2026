<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SubscriptionCopy extends Mailable
{
    use Queueable, SerializesModels;
    protected $subscriber;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($subscriber)
    {
        $this->subscriber = $subscriber;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $subscriber     = $this->subscriber;

        return $this->subject('Welcome to Gustovenus Services')
            ->view('emails.subscription_copy')
            ->with([
                'subscriber'        => $subscriber
            ]);
    }
}
