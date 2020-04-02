<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tipo_Rol extends Model
{
    protected $table = 'tipo_rols';

    protected $fillable = [
        'nombre'
    ];

    protected $hidden = [
        'id','tipo_rol_id','created_at','updated_at'
    ];

    function rol(){
        return $this->belongsTo('App\Models\Rol','tipo_rol_id');
     }
}
