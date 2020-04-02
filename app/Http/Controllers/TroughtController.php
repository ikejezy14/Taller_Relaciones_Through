<?php

namespace App\Http\Controllers;
use App\Models\Usuario;

use Illuminate\Http\Request;

class TroughtController extends Controller
{
    function throught(){
        $usuarios =Usuario::with('tipo_rols')->get();
        return $usuarios;
        //return Usuario::find(12)->tipo_rols;
    }
}
