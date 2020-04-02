<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $table = 'usuarios';

    protected $fillable = [
        'nombre','direccion','telefono','correo'
    ];

    protected $hidden = [
        'id','created_at','updated_at'
    ];

        function rol(){
           return $this->hasOne('App\Models\Rol','user_id');
        }

        function ventas(){
            return $this->hasMany('App\Models\Venta');
        }

        function tipo_rols(){
            return $this->hasOneThrough('App\Models\Tipo_Rol','App\Models\Rol','user_id','tipo_rol_id');
        }
}
