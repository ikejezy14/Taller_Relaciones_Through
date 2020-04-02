<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    protected $table = 'rols';

    protected $fillable = [
        'nombre'
    ];

    protected $hidden = [
        'id','user_id','created_at','updated_at'
    ];

    function usuario(){
        return $this->belongsTo('App\Models\Usuario','user_id');
     }

    function tipo_rol(){
        return $this->hasOne('App\Models\Tipo_Rol','tipo_rol_id');
    } 
}
