<!doctype html>
<html lang="es">

<head>
    <link href="https://fonts.googleapis.com/css?family=Merriweather&display=swap" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0">
    <title>Validación Cotización</title>
    <style>
        .code-style {
            font-family: 'Merriweather', serif;
            font-size: 30px;
            text-align: center;
        }

        div.caja {
            width: 140px;
            padding: 10px;
            border: 3px green dashed;
        }
    </style>
</head>

<body>

    <h2>Este es tu codigo de verificación: </h2>
    <div class="caja">
        <span class="code-style">{{$codigo}}</span>
    </div>

    <p>Hola <strong>{{$nombres}} {{$apellidos}}, </strong><br/>
        queremos informarte que haz hecho una solicitud de cotización con nosotros,
        utiliza el codigo anterior para confirmar que has hecho esta solicitud.
    </p>
    <Legend>
       --- Personal de IpWork &copy; ---
    </Legend>

</body>

</html>