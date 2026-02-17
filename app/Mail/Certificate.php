<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Log;

class Certificate extends Mailable
{
    use Queueable, SerializesModels, Dispatchable, InteractsWithQueue;

    protected $form_data;
    protected $pdf;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->form_data = $data;

        // $this->pdf = $pdf;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        Log::info("FORM DATA IN MAILABLE");

        /*Log::info("Cert path");
        Log::info(storage_path('certificates/'.$this->form_data['eventName'].'/'.$this->form_data['trainee'].'.pdf'));*/

        return $this->subject('Your Certificate From Smelting Afrika Consultants')
            ->view('emails.certificate')
            ->attach(storage_path('certificates/'.$this->form_data['id'].'/'.$this->form_data['trainee'].'.pdf'), [
                'as' => 'Smelting Afrika Consultants Certificate',
                'mime' => 'application/pdf',
            ])
            ->with([
                'form_data'        => $this->form_data,

            ]);
    }
}
