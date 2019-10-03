{{-- @extends('layouts.header') --}}
@section('contenido')
<div class="container">
    <div class="row">
        <h2>Cotización de seguros {{$hola}}</h2>
        <form action="/cotizacionInfo" method="post">
            @csrf
            <div class="form-group col-lg-12 col-md-12 col sm-12">
                <label class="col-form-label">
                    Nombre 
                </label>
                <input type="text" class="form-control" name="nombre">
            </div>
            <div class="form-group col-lg-12 col-md-12 col sm-12">
                <label class="col-form-label">
                    Apellido 
                </label>
                <input type="text" class="form-control" name="apellido">
            </div>
            <div class="form-group col-lg-12 col-md-12 col sm-12">
                <label class="col-form-label">
                    Tipo Documento 
                </label>
                <input type="text" class="form-control" name="tipodocumento">
            </div>
            <div class="form-group col-lg-12 col-md-12 col sm-12">
                <label class="col-form-label">
                    # Documento 
                </label>
                <input type="text" class="form-control" name="numerodocumento">
            </div>
            <div class="form-group col-lg-12 col-md-12 col sm-12">
                <label class="col-form-label">
                    Correo Electronico 
                </label>
                <input type="text" class="form-control" name="correo">
            </div>
            <div class="form-group col-lg-12 col-md-12 col sm-12">
                <label class="col-form-label">
                    Telefono 
                </label>
                <input type="text" class="form-control" name="telefono">
            </div>
            <div class="form-group col-lg-12 col-md-12 col sm-12">
                <button type="submit" class="btn btn-primary">Enviar</button>
            </div>
        </form>
    </div>
</div>
{{-- @extends('layouts.footer') --}}