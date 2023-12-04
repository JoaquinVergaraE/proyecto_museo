<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bloque;
class BloqueController extends Controller
{
    public function bloques(){
        $bloques = Bloque::all();
        return view('bloques', compact('bloques'));
    }
}
