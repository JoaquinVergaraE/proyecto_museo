<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UserController extends Controller
{

public function autenticar(Request $request)
{
    $credentials = $request->only('user', 'password');

    if (Auth::attempt($credentials)) {  
        return redirect()->route('administradoresIndex');
   } else {
        return back()->withErrors(['credenciales' => 'Credenciales incorrectas']);
    }
}

public function logout()
{
    Auth::logout();
    return redirect()->route('mostrarCalendarioDiasHabiles');
}



}
