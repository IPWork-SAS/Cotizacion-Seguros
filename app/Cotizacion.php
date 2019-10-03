<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cotizacion extends Model
{
    protected $table = 'cotizaciones';
    protected $fillable=[
        'nombres','apellidos','tipo_documento','numero_documento','telefono','correo','ubicacion'
    ];
    protected $primaryKey = 'id_cotizaciones';
}
