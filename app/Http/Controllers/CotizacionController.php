<?php

namespace App\Http\Controllers;

use App\Mail\CodigoDeVerificacion;
use App\Valor_seguro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Mail;
use Session;

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
        $consultaPlanes=DB::table('planes')->get();
        $codigo = session('codigo');
        if ($codigo == $request->input('codigo')) {

           $consultaCalculos= Db::table('valor_seguros')
           ->select('aseguradoras.id_aseguradora', 'aseguradoras.nombre_aseguradora', 'planes.id_plan','planes.nombre_plan','valor_seguros.id_valor_seguro')
            ->join('aseguradoras','valor_seguros.id_aseguradora','=','aseguradoras.id_aseguradora')
            ->join('planes','planes.id_plan','=','valor_seguros.id_plan')
            ->where('valor_seguros.valor_seguro','=','230000')
            ->get();

            // return ['consultaAseguradoras'=>$consultaAseguradoras];
            return $consultaCalculos;
        } else {
            // return view('formularios.cotizacion');
            abort(403);
            // return 'El código introducido no es correcto, por favor solicite un nuevo codigo';
        }
    }
}
