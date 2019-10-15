<!doctype html>
<html lang="es">

<head>
    <link href="https://fonts.googleapis.com/css?family=Merriweather&display=swap" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0">
    <title>Validación Cotización</title>
    <style>
    

        div.caja {
            font-family: 'Merriweather', serif;
            font-size: 30px;
            text-align: center;
            width: 170px;
            padding: 10px;
            margin: 0 auto;
            border: 3px green dashed;
            box-sizing: border-box;
        }

        .logo {
            width: 140px;
            height: 60px;
        }
        .caja-logo{
            margin-top: 20px; 
        }
    </style>
</head>

<body>
    <p>Hola <strong>{{ $nombres }} {{ $apellidos }}, </strong><br />
        queremos informarte que haz hecho una solicitud de cotización con nosotros,
        utiliza el siguiente codigo para confirmar que haz hecho esta solicitud.
    </p>
    
    <div class="caja">
        {{$codigo}}
    </div>
    <div class="caja-logo">
        <img src="https://www.ipwork.com.co/images/logo_ipwork.png" class="logo"><br/>
        Personal iPWork
    </div>

</body>

</html>