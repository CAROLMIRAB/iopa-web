<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class FormRequests extends Mailable
{
    use Queueable, SerializesModels;

    protected $form;

    protected $region;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($form, $region)
    {
        $this->form = $form;

        $this->region = $region;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('front.emails.requests', ['form' => $this->form, 'region' => $this->region ]);
    }
}
