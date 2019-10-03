<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rango_edad extends Model
{
    protected $table = 'rango_edades';
    protected $fillable=[
        'edad_inicial','edad_final'
    ];
    protected $primaryKey = 'id_rango_edad';

}
