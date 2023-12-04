<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Institucion;

class InstitucionController extends Controller
{
    public function instituciones(){
        $instituciones = Institucion::all();
        return view('instituciones', compact('instituciones'));
    }
}
