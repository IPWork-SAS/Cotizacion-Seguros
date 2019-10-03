<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    protected $table = 'planes';
    protected $fillable=[
        'nombre_plan','clave'
    ];
    protected $primaryKey = 'id_planes';
}
