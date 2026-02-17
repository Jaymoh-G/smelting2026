<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class CertificateTest extends Mailable
{
    use Queueable, SerializesModels, Dispatchable, InteractsWithQueue;

    protected $form_data;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->form_data = $data;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Your Certificate From Smelting Afrika Consultants')
            ->view('emails.certificate')
            ->with([
                'form_data'        => $this->form_data,

            ]);
    }
}
