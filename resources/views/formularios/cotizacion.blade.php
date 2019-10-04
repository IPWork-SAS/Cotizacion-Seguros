{{-- @extends('layouts.header') --}}
@section('contenido')
<div class="container">
    <div class="row">
        <h2>Cotización de seguros</h2>
        <form action="/cotizacionInfo" method="post">
            @csrf
            <div class="form-group col-lg-12 col-md-12 col sm-12">
                <label class="col-form-label">
                    Nombre
                </label>
                <input type="text" class="form-control" name="nombres">
            </div>
            <div class="form-group col-lg-12 col-md-12 col sm-12">
                <label class="col-form-label"> Apellidos
                </label>
                <input type="text" class="form-control" name="apellidos">
            </div>
            <div class="form-group col-lg-12 col-md-12 col sm-12">
                <label class="col-form-label">
                    Tipo Documento
                </label>
                <!-- <input type="text" class="form-control" name="tipo_documento"> -->
                <select name="tipo_documento">
                    <option>Seleccione un documento...</option>
                    <option value="CC">CC</option>
                    <option value="Pasaporte">Pasaporte</option>
                    <option value="Licencia de Conducción">Licencia de COn</option>
                </select>
            </div>
            <div class="form-group col-lg-12 col-md-12 col sm-12">
                <label class="col-form-label">
                    # Documento
                </label>
                <input type="text" class="form-control" name="numero_documento">
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