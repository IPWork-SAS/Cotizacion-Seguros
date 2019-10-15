<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        /* This is all you need */
        .table_wrapper {
            overflow-x: auto;
        }

        .table_wrapper table {
            width: auto;
        }

        /* For demo only... */
        .table_wrapper {
            width: 850px;
            margin-bottom: 20px;
        }

        .table_wrapper table {
            border: 1px solid #000;
            border-radius: 5px;
            padding: 7px;
        }

        .table_wrapper table th {
            text-align: left;
            padding: 10px 20px;
        }

        .table_wrapper table td {
            text-align: left;
            padding: 10px 20px;
        }
    </style>
</head>

<body>
    <table class="table_wrapper" style="max-width:900px; padding: 10px; margin:0 auto; border-collapse:collapse; ">
        <tr>
            <td style="padding: 0; background:#3b7e5b;">
                <img style="display: block; padding:0; margin: 8px auto;" width="25%" src="https://toncourtier.com/wp-content/themes/toncourtier/dist/images/logo_ad6e1faa.png">
            </td>
        </tr>
        <tr>
            <td style="background:#ecf0f1;font-family: sans-serif">
                <div style="color: #34495e; margin: 4% 10% 2%; text-align:justify; font-family: sans-serif">
                    <h2 style="color: #e67e22; margin: 0 0 7px">Cotizaciones por tramitar</h2>
                    @for ($i = 1; $i <= count($planes_aseguradoras['Aseguradoras']); $i++) 
                    <div class="table_wrapper">
                        <table style="width: 700px;">
                            <tr>
                                <th>{{$planes_aseguradoras['Aseguradoras'][$i]}}</th>
                                <th>{{$planes_aseguradoras['Planes'][$i]}}</th>
                            </tr>

                            <tr>
                                <th>Nombres </th>
                                <th>Fecha Inicio </th>
                                <th>Fecha Fin </th>
                                <th>Valor/día </th>
                                <th>Valor total </th>
                            </tr>
                            @foreach($cotizaciones as $cotizacion)
                            @if($cotizacion->nombre_aseguradora === $planes_aseguradoras['Aseguradoras'][$i])
                            @php
                            $valor_total += $cotizacion->valor_total;
                            @endphp
                            <tr>
                                <td> {{$cotizacion->nombre_cotizante}} </td>
                                <td> {{$cotizacion->fecha_inicio}} </td>
                                <td> {{$cotizacion->fecha_fin}} </td>
                                <td> $ {{$cotizacion->valor_dia}} </td>
                                <td> $ {{$cotizacion->valor_total}} </td>
                            </tr>
                            @endif
                            @endforeach
                            <tr>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>Valor general total:</td>
                                <td>$ {{$valor_total}}</td>
                            </tr>
                        </table>
                </div>
                @endfor
            </td>
        </tr>
    </table>
</body>

</html>