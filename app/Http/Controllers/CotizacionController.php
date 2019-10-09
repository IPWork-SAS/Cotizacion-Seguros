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
        
        $fecha_min= date('Y-m-d');
        $fecha_max= date('Y-m-d');
        $fecha_max++;
        return view('formularios.cotizacion',compact('valores_seguros','fecha_min','fecha_max'));
    }
    public function informacionCliente(Request $request)
    {
        session(['request' => $request->toArray()]);

        $codigo = hash('crc32', rand());
         session(['codigo'=>$codigo]);

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

        /* Mail::to(session('request')['correo'])->send(new CodigoDeVerificacion(
            session('request')['nombres'],
            session('request')['apellidos'],
            session('codigo')
        )); */
        if (Mail::failures()) {
            return 'Lo sentimos, intentelo más tarde';
        } else {
            return view('formularios.validacion', compact('codigo'));
        }
    }
    public function validacionCliente(Request $request)
    {
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
        if(count($consultaCalculos) > 0){
            $usuario = new Usuario();
            $cotizacion = new Cotizacion();
            $usuario->nombres = session('request')['nombres'];
            $usuario->apellidos = session('request')['apellidos'];
            $usuario->tipo_documento = session('request')['tipo_documento'];
            $usuario->numero_documento = session('request')['numero_documento'];
            $usuario->telefono = '+'.session('request')['telefonoidentificativo'].session('request')['telefono'];
            $usuario->correo = session('request')['correo'];
            $usuario->edad = session('request')['edad_cotizante'];
            $usuario->ubicacion_longitud = session('request')['geolocalizacionlongitud'];
            $usuario->ubicacion_latitud = session('request')['geolocalizacionlatitud'];
            
            $usuario->save();
            
            session(['id_usuario' => $usuario->id_usuario]);

            $fecha_inicio = new Carbon(session('request')['fecha_inicio']);
            $fecha_fin = new Carbon(session('request')['fecha_fin']);
            $dias = $fecha_inicio->diff($fecha_fin)->days;
            
            for ($i=0; $i < count($consultaCalculos); $i++) { 
                
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
                
                $cotizacion = new Cotizacion();
                $cotizacion->nombre_cotizante = session('request')['nombres'];
                $cotizacion->fecha_inicio = $fecha_inicio;
                $cotizacion->fecha_fin = $fecha_fin;
                $cotizacion->valor_dia = $valorUnico->valor;
                $cotizacion->valor_total = $valorUnico->valor*$dias;
                $cotizacion->id_usuario = $usuario->id_usuario;
                $cotizacion->id_aseguradora = $consultaCalculos[$i]->id_aseguradora;
                $cotizacion->id_plan = $consultaCalculos[$i]->id_plan;
                $cotizacion->id_rango_edad = $rangoedad->id_rango_edad;
                $cotizacion->id_valor_seguro = $consultaCalculos[$i]->id_valor_seguro;
                
                $cotizacion->save();
                
                if(isset(session('request')['nombre_afiliado'])){
                    for ($j=0; $j < count(session('request')['nombre_afiliado']); $j++) { 
                        
                        $rangoedadAfiliado=  DB::table('rango_edades')
                            ->select('id_rango_edad')
                            ->where('edad_inicial', '<=', session('request')['edad_afiliado'][$j])
                            ->where('edad_final', '>=', session('request')['edad_afiliado'][$j])
                            ->where('id_aseguradora', $consultaCalculos[$i]->id_aseguradora)
                            ->first();
                            
                        $valorUnicoAfiliado=  DB::table('valores')
                            ->select('valor')
                            ->where('id_rango_edad', $rangoedadAfiliado->id_rango_edad)
                            ->where('id_valor_seguro', $consultaCalculos[$i]->id_valor_seguro)
                            ->first();
                        
                        $cotizacionAfiliado = new Cotizacion();
                        $cotizacionAfiliado->nombre_cotizante = session('request')['nombre_afiliado'][$j];
                        $cotizacionAfiliado->fecha_inicio = $fecha_inicio;
                        $cotizacionAfiliado->fecha_fin = $fecha_fin;
                        $cotizacionAfiliado->valor_dia = $valorUnicoAfiliado->valor;
                        $cotizacionAfiliado->valor_total = $valorUnicoAfiliado->valor*$dias;
                        $cotizacionAfiliado->id_usuario = $usuario->id_usuario;
                        $cotizacionAfiliado->id_aseguradora = $consultaCalculos[$i]->id_aseguradora;
                        $cotizacionAfiliado->id_plan = $consultaCalculos[$i]->id_plan;
                        $cotizacionAfiliado->id_rango_edad = $rangoedadAfiliado->id_rango_edad;
                        $cotizacionAfiliado->id_valor_seguro = $consultaCalculos[$i]->id_valor_seguro;
                        
                        $cotizacionAfiliado->save();
                    }
                }
            }
        }
        return redirect()->route('cotizaciones');
    }  
        
    public function cotizaciones(){
        $cotizaciones = DB::table('cotizaciones')
            ->join('aseguradoras', 'cotizaciones.id_aseguradora', '=', 'aseguradoras.id_aseguradora')
            ->join('planes', 'cotizaciones.id_plan', '=', 'planes.id_plan')
            ->select('cotizaciones.nombre_cotizante', 'cotizaciones.fecha_inicio', 'cotizaciones.fecha_fin', 'cotizaciones.valor_dia', 'cotizaciones.valor_total', 'aseguradoras.nombre_aseguradora', 'planes.nombre_plan')
            ->where('cotizaciones.id_usuario', session('id_usuario'))
            ->orderBy('aseguradoras.id_aseguradora')
            ->get();
        $planes_aseguradoras = [];
        $planes_aseguradoras['Aseguradoras'][0] = '';
        $planes_aseguradoras['Planes'][0] = '';
        foreach($cotizaciones as $cotizacion){
            if($cotizacion->nombre_aseguradora <> $planes_aseguradoras['Aseguradoras'][count($planes_aseguradoras['Aseguradoras'])-1]){
                $planes_aseguradoras['Aseguradoras'][count($planes_aseguradoras['Aseguradoras'])] = $cotizacion->nombre_aseguradora;
            }
            if($cotizacion->nombre_plan <> $planes_aseguradoras['Planes'][count($planes_aseguradoras['Planes'])-1]){
                $planes_aseguradoras['Planes'][count($planes_aseguradoras['Planes'])] = $cotizacion->nombre_plan;
            }
        }
        unset($planes_aseguradoras['Aseguradoras'][0]);
        unset($planes_aseguradoras['Planes'][0]);
        $valor_total = 0;
      

        return view('formularios.cotizaciones',compact('cotizaciones','planes_aseguradoras','valor_total'));
    }
}