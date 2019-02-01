<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class InvoicesMail extends Mailable
{
    use Queueable, SerializesModels;

    public $invoices;
    
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($invoices)
    {
        $this->invoices = $invoices;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Invoices')
            //->replyTo('no-reply@polyglots.com')
            ->view('email.invoices');
    }
}
