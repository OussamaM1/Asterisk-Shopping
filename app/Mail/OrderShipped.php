<?php

namespace App\Mail;

use App\Commande;
use App\Ligne;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Http\Controllers\CommandeController;
class OrderShipped extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('elhilaliyacin@gmail.com')
                ->subject("Confirmation de l’envoi d’une commande")
                ->view('emails.orderShipped');
    }
}
