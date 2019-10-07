<?php

namespace App\Http\Controllers;

use App\Mail\CodigoDeVerificacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Mail;
use Carbon\Carbon;

class CotizacionController extends Controller
{
    public function index()
    {
        $valores_seguros=DB::table('valor_seguros')->select('valor_seguro')->get();
        return view('formularios.cotizacion',compact('valores_seguros'));
    }
    public function informacionCliente(Request $request)
    {
        session(['request' => $request->toArray()]);

        $codigo = hash('crc32', rand());
         session(['codigo'=>$codigo]);
        // return session('request');

        //Segunda forma
        /* Mail::to($correo)->send(new EmailEnvioUsuario(
             $nombres,$apellidos,$codigo
         ));*/


        //Primera forma
        /* 
        $subject = 'Código de Verificación';
         $body = '';
         Mail::to($user)->send(new MailNotify($user));
         Mail::send([], [], function ($message) use($correo,$subject,$body){
             $message->to($correo)
             ->subject($subject)
              ->setBody($body, 'text/html'); // for HTML rich messages
           });
        */

        /* Descomentar para usar el envío de correos 

        Mail::to(session('request')['correo'])->send(new CodigoDeVerificacion(
            session('request')['nombres'],
            session('request')['apellidos'],
            session('request')['codigo']
        ));
        */


        if (Mail::failures()) {
            return 'Lo sentimos, intentelo más tarde';
        } else {
            return view('formularios.validacion', compact('codigo'));
        }
    }
    public function validacionCliente(Request $request)
    {
        $consultaAseguradoras=DB::table('aseguradoras')->get();
        /* session('request');
        $fecha_inicio = new Carbon(session('request')['fecha_inicio']);
        $fecha_fin = new Carbon(session('request')['fecha_fin']);
        $dias = $fecha_inicio->diff($fecha_fin)->days;
        $rangoedad=  DB::table('rango_edades')
            ->select('id_rango_edad')
            ->where('edad_inicial', '<=', session('request')['edad_cotizante'])
            ->where('edad_final', '>=', session('request')['edad_cotizante'])
            ->get();
        return $dias; */
        $codigo = session('codigo');
        if($codigo !== $request->input('codigo')){
            abort(403);
        }
        // return $consultaAseguradoras;
    }
}
