<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aseguradora extends Model
{
    protected $table = 'aseguradoras';
    protected $fillable=[
        'nombre_aseguradora'
    ];
    protected $primaryKey = 'id_aseguradora';
}
