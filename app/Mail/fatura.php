<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class fatura extends Mailable
{
    use Queueable, SerializesModels;

    public $order;
    public $layout;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($order, $layout)
    {
        $this->order = $order;
        $this->layout = $layout;
    }


    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Reserva da Merch')

                    ->view('mail/fatura');
    }
}