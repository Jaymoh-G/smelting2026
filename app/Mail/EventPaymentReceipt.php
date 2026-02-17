<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EventPaymentReceipt extends Mailable
{
    use Queueable, SerializesModels;
    protected $mail_data;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($mail_data)
    {
        $this->mail_data = $mail_data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Event Payment Receipt')
            ->view('emails.event_receipt')
            ->with([
                'mail_data' => $this->mail_data
            ]);
    }
}
