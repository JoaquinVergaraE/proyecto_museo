<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function paginaDespuesDeGuardar(){
        return view('paginaDespuesDeGuardar');
    }

    public function login(){
        return view('login');
    }

    public function autenticar(Request $request)
    {
        $user = $request->user;
        $password = $request->password;
        
    
    if ($user === 'admin' && $password === '123') {

        return redirect()->route('administradoresIndex');
    } else {
        return back()->withErrors(['credenciales' => 'Credenciales incorrectas']);
        }
    }

    public function administradoresIndex(){
        return view('administradoresIndex');
    }

}
