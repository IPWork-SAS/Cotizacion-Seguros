<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class CodigoDeVerificacion extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $nombres;
    public $apellidos;
    public $codigo;

    public function __construct($nombres,$apellidos,$codigo)
    {
        $this->nombres = $nombres;
        $this->apellidos = $apellidos;
        $this->codigo = $codigo;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // return $this->view('mails.email_usuario',compact('nombres','apellidos','codigo'));
        return $this->from(env('MAIL_USERNAME'), session('empresa'))
                    ->view('mails.email_usuario')->subject('Codigo de verificación');
                //     ->attach(public_path('/images').'/logo_ipwork.png', [
                //         'as' => 'logo_ipwork.png',
                //         'mime' => 'image/png',
                // ]);
    }
}
