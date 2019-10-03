<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Redirect,Response,DB,Config;
use App\Mail\MailNotify;
use Mail;

class EmailController extends Controller
{
    
    public function sendEmailAdmin()
    {
        $user = 'maacevedog2010@gmail.com';
        $subject ='Test Email';
        $body='<h2>Datos del cotizante:</h2>
        <p>Nombre: Juan Jesus Almadarriaga<br/>
        Precio: $32 USD<br/>
        Seguro: Sura - Plan de vida </p>';
        // Mail::to($user)->send(new MailNotify($user));

        Mail::send([], [], function ($message) use($user,$subject,$body){
            $message->to($user)
              ->subject($subject)
              ->setBody($body, 'text/html'); // for HTML rich messages
          });

        if (Mail::failures()) {
            return 'Lo sentimos, intentelo más tarde';
        } else {
            return view('welcome');
        }
    }
}
