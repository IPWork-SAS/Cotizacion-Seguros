$(document).ready(function () {
    var contador = 1;
    $("#BtnAdd").on('click', function () {
        $("#DivSubmit").before(`
        <div class="row" id="afiliado`+contador+`" style="margin-bottom: 10px;">
            <div class="column" style="width: 47%;">
                <label class="desc">
                    Nombre:
                </label>
                <input class="field text large" name="nombre_afiliado[]" required="" type="text" minlength="3"  maxlength="255" value="">
            </div>
            <div class="column" style="width: 47%;">
                <label class="desc">
                    Edad:
                </label>
                <input class="field text large" name="edad_afiliado[]" required="" type="number" minlength="1" min="0" maxlength="255" value="">
            </div>
            <div class="column" style="width: 4%;padding: 2%;margin: 1%;cursor: pointer;">
                <span onclick="$('#afiliado`+contador+`').remove();" title="Eliminar Afiliado"><i class="fas fa-trash"></i></span>
            </div>
        </div>
        `);
        contador += 1;
    });
    var geolocalizacion = localStorage.getItem('geolocation');
    if(!geolocalizacion){
        localStorage.setItem('geolocation',1);
        if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function (objPosition) {
            $("#geolocalizacionlatitud").val(objPosition.coords.longitude);
            $("#geolocalizacionlongitud").val(objPosition.coords.latitude);
        }, function (objPositionError) {
            $("#geolocalizacionlatitud").val('No permitio ubicacion');
            $("#geolocalizacionlongitud").val('No permitio ubicacion');
        }, {});
        } 
        else {
        $("#geolocalizacionlatitud").val('No permitio ubicacion');
        $("#geolocalizacionlongitud").val('No permitio ubicacion');
        }
    }
    else{
        $("#geolocalizacionlatitud").val('No permitio ubicacion');
        $("#geolocalizacionlongitud").val('No permitio ubicacion');
    }
});