<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Grupo;
class GrupoController extends Controller
{
    public function grupos(){
        $grupos = Grupo::all();
        return view('grupos', compact('grupos'));
    }
}
