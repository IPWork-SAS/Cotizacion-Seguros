<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $table = 'usuarios';
    protected $fillable=[
        'nombres','apellidos','tipo_documento','numero_documento','telefono','correo','ubicacion'
    ];
    protected $primaryKey = 'id_usuario';
}
