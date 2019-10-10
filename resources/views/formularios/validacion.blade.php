@extends('layouts.header')
@section('titulo')
    <b>Verificación de código</b>
@endsection
@section('contenido')
    <form action="/cotizacionvalidar" method="POST" class="wufoo leftLabel hideMarkers cotizacion">
        @csrf
        <div class="row">
            <label class="desc">
                Código:
            </label>
            <input name="codigo" type="text" class="field text large" value="" size="8" tabindex="0" required="" style="text-align: center;">
        </div>
        <div style="text-align: center; margin-top: 25px;">
            <button type="submit">Verificar</button>
        </div>
    </form>
@endsection