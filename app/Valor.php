<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Valor extends Model
{
    protected $table = 'valores';
    protected $fillable=[
        'valor',
    ];
    protected $primaryKey = 'id_valor';
}
