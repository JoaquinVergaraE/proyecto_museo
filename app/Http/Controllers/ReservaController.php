<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reserva;

class ReservaController extends Controller
{
    public function reserva($cod_bloque, $cod_actividad, $fecha) {
        $cod_bloque = $cod_bloque;
        $cod_actividad = $cod_actividad;
        $fecha = $fecha;
        return view('reserva', compact('cod_bloque','cod_actividad','fecha'));
    }

    public function reservas(){
        $reservas = Reserva::all();
        return view('reservas', compact('reservas'));
    }
    
}
