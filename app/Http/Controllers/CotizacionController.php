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
         session('request');
        
        $codigo = session('codigo');

           if($codigo !== $request->input('codigo')){
               abort(403);
            }
            $consultaCalculos= Db::table('valor_seguros')
            ->select('aseguradoras.id_aseguradora', 'aseguradoras.nombre_aseguradora', 'planes.id_plan','planes.nombre_plan','valor_seguros.id_valor_seguro')
            ->join('aseguradoras','valor_seguros.id_aseguradora','=','aseguradoras.id_aseguradora')
            ->join('planes','planes.id_plan','=','valor_seguros.id_plan')
            ->where('valor_seguros.valor_seguro','=', session('request')['valor_seguro'])
            ->get();
        // return $consultaCalculos;
        if(count($consultaCalculos) > 0){
            $usuario = new Usuario();
            $cotizacion = new Cotizacion();
            $usuario->nombres = session('request')['nombres'];
            $usuario->apellidos = session('request')['apellidos'];
            $usuario->tipo_documento = session('request')['tipo_documento'];
            $usuario->numero_documento = session('request')['numero_documento'];
            $usuario->telefono = session('request')['telefono'];
            $usuario->correo = session('request')['correo'];
            $usuario->edad = session('request')['edad_cotizante'];
            $usuario->ubicacion = "Mi ubicacion actual";

            $usuario->save();

            $fecha_inicio = new Carbon(session('request')['fecha_inicio']);
            $fecha_fin = new Carbon(session('request')['fecha_fin']);
            $dias = $fecha_inicio->diff($fecha_fin)->days;

            for ($i=0; $i < count($consultaCalculos); $i++) { 

            $cotizacion = new Cotizacion();

            $rangoedad=  DB::table('rango_edades')
            ->select('id_rango_edad')
            ->where('edad_inicial', '<=', session('request')['edad_cotizante'])
            ->where('edad_final', '>=', session('request')['edad_cotizante'])
            ->where('id_aseguradora', $consultaCalculos[$i]->id_aseguradora)
            ->first();

            $valorUnico=  DB::table('valores')
            ->select('valor')
            ->where('id_rango_edad', $rangoedad->id_rango_edad)
            ->where('id_valor_seguro', $consultaCalculos[$i]->id_valor_seguro)
            ->first();
            // $rangoedad->id_rango_edad
            // $consultaCalculos[$i]->id_aseguradora
            //  echo $valorUnico->valor;

             
             $cotizacion->nombre_cotizante = session('request')['nombres'];
             $cotizacion->fecha_inicio = $fecha_inicio;
             $cotizacion->fecha_fin = $fecha_fin;
             $cotizacion->valor_dia = $valorUnico->valor;
             $cotizacion->valor_total = $valorUnico->valor*$dias;
             $cotizacion->id_usuario =$usuario->id_usuario;
             $cotizacion->id_aseguradora = $consultaCalculos[$i]->id_aseguradora;
             $cotizacion->id_plan = $consultaCalculos[$i]->id_plan;
             $cotizacion->id_rango_edad = $rangoedad->id_rango_edad;
             $cotizacion->id_valor_seguro = $consultaCalculos[$i]->id_valor_seguro;

             $cotizacion->save();

            
                /*  $cotizacion = "insersion de la cotización";
                if(count(session('request')['nombre_afiliado']) > 0){
                    for ($i=0; $i < count(session('request')['nombre_afiliado']); $i++) { 
                        $cotizacionAfiliado= "insersion de los afiliados a su cotizacion";
                    }
                } */
            }
            exit;
        }
    }  
}