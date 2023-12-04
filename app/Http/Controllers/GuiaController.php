<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Guia;

class GuiaController extends Controller
{
    public function guias(){
        $guias = Guia::all();
        return view('guias', compact('guias'));
    }
}
