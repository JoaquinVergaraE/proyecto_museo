<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FechasActividad;
class FechasActividadController extends Controller
{
    public function fechasActividad(){
        $fechasActividad = FechasActividad::all();
        return view('fechasActividad', compact('fechasActividad'));
    }
}
