<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CotizacionController extends Controller
{
    public function index(){
        $hola = "Hola Miguel";
        return view('formularios.cotizacion', compact('hola'));
    }

    public function informacion(Request $request){
        return $request->input('nombre');
    }
}
