<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .container{
            width: auto;
        }
        .card-general {
            border: 1px solid black;
            width:400px;
            margin: 0 auto;
            margin-bottom: 15px;
        }

        .card-general h3 {
            text-align: center;
        }

        .card-specific {
            border: 1px solid black;
            text-align: center;
            width:380px;
            margin: 0 auto;
            margin-bottom: 15px;
        }

        span {
            color: green;
        }
        .column.two-col{
            display: inline-block;
        }
    </style>
</head>

<body>
    <div class="container">

    
    @foreach($cotizaciones as $cotizacion)
    <div class="card-general">

        <h3>Aseguradora: <span>{{$cotizacion->nombre_aseguradora}}</span></h3>
        <h3>Plan seguro: <span>{{$cotizacion->nombre_plan}}</span></h3>


        <div class="card-specific">
            <div class="row">
                <div class="column">
                    <h5>Nombre cotizante: <span>{{$cotizacion->nombre_cotizante}}</span></h3>
                </div>
            </div>
            <div class="row">
                <div class="column two-col">
                    <h5>Fecha Inicio: <span>{{$cotizacion->fecha_inicio}}</span></h3>
                </div>
                <div class="column two-col">
                    <h5>Fecha Fin: <span>{{$cotizacion->fecha_fin}}</span></h3>
                </div>
            </div>
            <div class="row">
                <div class="column two-col">
                    <h5>Valor Día: <span>{{$cotizacion->valor_dia}}</span></h3>
                </div>
                <div class="column two-col">
                    <h5>Valor Total: <span>{{$cotizacion->valor_total}}</span></h3>
                </div>
            </div>
        </div>
       
    </div>
    @endforeach
    </div>
</body>

</html>