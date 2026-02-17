<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EventRegistrationCopy extends Mailable
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

        return $this->subject('Smelting Afrika Consultants Training')
            ->view('emails.event_registration_copy')
            ->with([
                'subscriber'        => $subscriber
            ]);
    }
}
