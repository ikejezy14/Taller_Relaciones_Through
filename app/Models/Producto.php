<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table = 'productos';

    protected $fillable = [
        'nombre','precio'
    ];

    protected $hidden = [
        'id','created_at','updated_at'
    ];

    function ventas(){
        return $this->belongsToMany('App\Models\Venta');
    }
}
