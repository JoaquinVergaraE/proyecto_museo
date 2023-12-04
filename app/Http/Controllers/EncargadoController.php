<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Encargado;
class EncargadoController extends Controller
{
    public function encargados(){
        $encargados = Encargado::all();
        return view('encargados', compact('encargados'));
    }
}
