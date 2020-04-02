<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    protected $table = 'ventas';

    protected $fillable = [
        'num_venta'
    ];

    protected $hidden = [
        'id','usuario_id','created_at','updated_at'
    ];

    function usuario(){
        return $this->belongsTo('App\Models\Usuario','usuario_id');
    }

    function productos(){
        return $this->belongsToMany('App\Models\Producto', 'venta_producto','venta_id','producto_id');
    }
}
