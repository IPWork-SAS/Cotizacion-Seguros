<?php

namespace App\Http\Controllers;

use App\Mail\CodigoDeVerificacion;
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
        $nombres = $request->input('nombres');
        $apellidos = $request->input('apellidos');
        $tipo_documento = $request->input('tipo_documento');
        $numero_documento = $request->input('numero_documento');
        $correo = $request->input('correo');
        $telefono = $request->input('telefono');
        $codigo = hash('crc32', rand());
        $empresa = 'iPWork Solutions';
        session([
            'codigo' => $codigo,
            'nombres' => $nombres,
            'apellidos' => $apellidos,
            'tipo_documento' => $tipo_documento,
            'numero_documento' => $numero_documento,
            'correo' => $correo,
            'telefono' => $telefono,
            'empresa' => $empresa

        ]);
        //first way
        /* Mail::to($correo)->send(new EmailEnvioUsuario(
             $nombres,$apellidos,$codigo
         ));*/


        //second way
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

        Mail::to(session('correo'))->send(new CodigoDeVerificacion(
            session('nombres'),
            session('apellidos'),
            session('codigo')
        ));


        if (Mail::failures()) {
            return 'Lo sentimos, intentelo más tarde';
        } else {
            return view('formularios.validacion', compact('codigo'));
        }
    }
    public function validacionCliente(Request $request)
    {
        $codigo = session('codigo');
        if ($codigo == $request->input('codigo')) {
            return 'Validación exitosa';
        } else {
            // return view('formularios.cotizacion');
            abort(403);
            // return 'El código introducido no es correcto, por favor solicite un nuevo codigo';
        }
    }
}
