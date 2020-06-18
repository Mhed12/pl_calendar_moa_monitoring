<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Moa extends Model
{
    //protected $table ='moas';
    public $timestamps = false;
    protected $fillable = [
        'par_name', 'par_opr', 'par_description', 'date_signed', 'date_expiration',
    ];
}
