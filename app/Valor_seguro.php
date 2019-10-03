<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Valor_seguro extends Model
{
    protected $table = 'seguros';
    protected $fillable=[
        'valor_seguro',
    ];
    protected $primaryKey = 'id_valor_seguro';
}
