<?php

namespace App\Http\Controllers;

use App\Mail\CodigoDeVerificacion;
use App\Valor_seguro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Mail;
use Carbon\Carbon;
use App\Usuario;
use App\Cotizacion;

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
        $consultaCalculos= Db::table('valor_seguros')
            ->join('aseguradoras','valor_seguros.id_aseguradora','=','aseguradoras.id_aseguradora')
            ->join('planes','planes.id_plan','=','valor_seguros.id_plan')
            ->where('valor_seguros.valor_seguro','=', session('request')['valor_seguro'])
            ->get();
        
        if(count($consultaCalculos) > 0){
            $usuario = new Usuario();
            $usuario->nombres = session('request')['nombres'];
            $usuario->apellidos = session('request')['apellidos'];
            $usuario->tipo_documento = session('request')['tipo_documento'];
            $usuario->numero_documento = session('request')['numero_documento'];
            $usuario->telefono = session('request')['telefono'];
            $usuario->correo = session('request')['correo'];
            $usuario->edad = session('request')['edad_cotizante'];
            $usuario->ubicacion = "Mi ubicacion actual";
            $usuario->save();

            for ($i=0; $i < count($consultaCalculos); $i++) { 
                
                /*  $cotizacion = "insersion de la cotización";
                if(count(session('request')['nombre_afiliado']) > 0){
                    for ($i=0; $i < count(session('request')['nombre_afiliado']); $i++) { 
                        $cotizacionAfiliado= "insersion de los afiliados a su cotizacion";
                    }
                } */
            }
        }
        else{
            abort(503);
        }
        return session('request');
    }
}
