<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Afiliado extends Model
{
    protected $table = 'afiliados';
    protected $fillable=[
        'nombre_afiliado',
        'edad_afiliado'
    ];
    protected $primaryKey = 'id_afiliados';
}
