@extends('layouts.header')
@section('titulo')
<b>Cotización de seguros</b>
@endsection
@section('contenido')
    @for ($i = 1; $i <= count($planes_aseguradoras['Aseguradoras']); $i++)
        <div class="cotizacion contenedor">
            <div class="row">
                <div class="column" style="width: 100%">
                    <span><b>{{$planes_aseguradoras['Aseguradoras'][$i]}}</b></span>
                </div>
            </div>
            <div class="row">
                <div class="column" style="width: 100%">
                    <span><b>{{$planes_aseguradoras['Planes'][$i]}}</b></span>
                </div>
            </div>
            <div class="row">
                    <div class="column" style="width: 20%;">
                        <span><b>Nombres</b></span>
                    </div>
                    <div class="column" style="width: 20%;">
                        <span><b>Fecha Inicio</b></span>
                    </div>
                    <div class="column" style="width: 20%;">
                        <span><b>Fecha Fin</b></span>
                    </div>
                    <div class="column" style="width: 20%;">
                        <span><b>Valor/día</b></span>
                    </div>
                    <div class="column" style="width: 20%;">
                        <span><b>Valor total</b></span>
                    </div>
            </div>
            @foreach($cotizaciones as $cotizacion)
                    @if($cotizacion->nombre_aseguradora === $planes_aseguradoras['Aseguradoras'][$i])
                        @php
                            $valor_total += $cotizacion->valor_total;
                        @endphp
                        <div class="row">
                            <div class="column" style="width: 20%;">
                                <span>{{$cotizacion->nombre_cotizante}}</span>
                            </div>
                            <div class="column" style="width: 20%;">
                                <span>{{$cotizacion->fecha_inicio}}</span>
                            </div>
                            <div class="column" style="width: 20%;">
                                <span>{{$cotizacion->fecha_fin}}</span>
                            </div>
                            <div class="column" style="width: 20%;">
                                <span>$ {{$cotizacion->valor_dia}}</span>
                            </div>
                            <div class="column" style="width: 20%;">
                                <span>$ {{$cotizacion->valor_total}}</span>
                            </div>
                        </div>
                    @endif
                @endforeach
                <div class="row">
                    <div class="column" style="text-align: right; width: 70%;">
                        <span><b>Valor general total:</b></span>
                    </div>
                    <div class="column" style="text-align: right; width: 28%;">
                    <span><b>$ {{$valor_total}}</b></span>
                    </div>
                </div>
        <button class="btnComprar">Comprar</button>
    </div>
    <br>
    <br>
    @endfor
    @endsection