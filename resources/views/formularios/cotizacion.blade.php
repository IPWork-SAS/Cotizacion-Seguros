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
            <select name="tipo_documento" class="field select large" data-wufoo-field="dropdown" required>
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
            <input class="field text large" name="numero_documento" required="" type="number" minlength="7" min="0" maxlength="255" value="">
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
            <select name="valor_seguro" class="field select large" data-wufoo-field="dropdown" required>
                <option value="">Seleccione...</option>
                @foreach ($valores_seguros as $valor)
                    <option value="{{$valor->valor_seguro}}">{{$valor->valor_seguro}}</option>    
                @endforeach
            </select>
        </div>
        <div class="column">
            <label class="desc">
                Edad:
            </label>
            <input class="field text large" name="edad_cotizante" required="" type="number" minlength="1" min="0" maxlength="255" value="">
        </div>
    </div>
    <hr>
    <div class="row">
            <div class="column">
                <label class="desc">
                    Fecha Inicio:
                </label>
                <input class="field text large" name="fecha_inicio" required="" type="date" value="">
            </div>
            <div class="column">
                <label class="desc">
                    Fecha Fin:
                </label>
                <input class="field text large" name="fecha_fin" required="" type="date" value="">
            </div>
        </div>
    <div class="row">
            <h4><b>Afiliados</b></h4>
        </div>
    <div style="text-align: center; margin-bottom: 10px;" id="DivSubmit">
        <button type="button" id="BtnAdd">Añadir</button>
    </div>
    <hr>
    <div style="text-align: center; margin-top: 25px;">
        <button type="submit">Enviar</button>
    </div>
</form>
@endsection