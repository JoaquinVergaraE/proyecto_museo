<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controller as BaseController;


class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function paginaDespuesDeGuardar(){
        return view('paginaDespuesDeGuardar');
    }

    public function login()
    {
        if (Auth::check()) {
            // Si el usuario ya está autenticado, redirigirlo a la ruta correcta
            return redirect()->route('administradoresIndex');
        }
    
        // Si el usuario no está autenticado, mostrar el formulario de inicio de sesión
        return view('login');
    }

    public function autenticar(Request $request)
{
  //  $credentials = $request->only('user', 'password');

   // if (Auth::attempt($credentials)) {
        // La autenticación fue exitosa
        return redirect()->route('administradoresIndex');
   // } else {
        // La autenticación falló
   //     return back()->withErrors(['credenciales' => 'Credenciales incorrectas']);
    //}
}

    public function administradoresIndex(){
        return view('administradoresIndex');
    }

}
