<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class EmailCotizacionAdmin extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $cotizaciones,$planes_aseguradoras,$valor_total;
    public function __construct($cotizaciones,$planes_aseguradoras,$valor_total)
    {
        $this->cotizaciones=$cotizaciones;
        $this->planes_aseguradoras=$planes_aseguradoras;
        $this->valor_total=$valor_total;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from(env('MAIL_USERNAME'), session('empresa'))
                    ->view('mails.email_cotizaciones_admin')->subject('Cotización de seguros solicitadas');
    }
}
