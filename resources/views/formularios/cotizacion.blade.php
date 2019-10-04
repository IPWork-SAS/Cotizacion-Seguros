@extends('layouts.header')
@section('titulo')
<b>Cotización de seguros</b>
@endsection
@section('contenido')
<form action="/cotizacionInfo" method="post" class="wufoo leftLabel hideMarkers cotizacion">
    @csrf
    <div class="row">
        <h4><b>DATOS DEL COTIZANTE</b></h4>
    </div>
    <div class="row">
        <div class="column">
            <label class="desc">
                Nombre:
            </label>
            <input name="nombres" type="text" class="field text large" value="" size="8" tabindex="0" required="">
        </div>
        <div class="column">
            <label class="desc">
                Apellido:
            </label>
            <input name="apellidos" type="text" class="field text large" value="" size="14" tabindex="0" required="">
        </div>
    </div>
    <div class="row">
        <div class="column">
            <label class="desc">
                Tipo Documento:
            </label>
            <select name="tipodocumento" class="field select large" data-wufoo-field="dropdown" required>
                <option value="">Seleccione...</option>
                <option value="CC">Cedula Ciudadania</option>
                <option value="CE">Cedula Extranjera</option>
                <option value="RUT">Rut</option>
                <option value="NIT">Nit</option>
            </select>
        </div>
        <div class="column">
            <label class="desc">
                # Documento:
            </label>
            <input class="field text large" name="numerodocumento" required="" type="number" minlength="7" maxlength="255" value="">
        </div>
    </div>
    <div class="row">
        <div class="column">
            <label class="desc">
                Correo Electronico:
            </label>
            <input name="correo" type="email" spellcheck="false" class="field text large" value="" maxlength="255" required="">
        </div>
        <div class="column">
            <label class="desc">
                Telefono:
            </label>
            <input class="field text large" name="telefono" required="" type="number" minlength="10" maxlength="255" value="">
        </div>
    </div>
    <div class="row">
        <div class="column">
            <label class="desc">
                Valor a cotizar:
            </label>
            <select name="valorseguro" class="field select large" data-wufoo-field="dropdown">
                <option value="">Seleccione...</option>
                <option value="1">1</option>
            </select>
        </div>
        <div class="column">
            <label class="desc">
                Edad:
            </label>
            <input class="field text large" name="edadcotizante" required="" type="number" minlength="1" min="0" maxlength="255" value="">
        </div>
    </div>
    <hr>
    <div style="text-align: center; margin-top: 25px;">
        <button type="submit">Enviar</button>
    </div>
</form>
@endsection