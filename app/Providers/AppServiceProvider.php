<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot()
{
    Validator::extend('rut_chileno', function ($attribute, $value, $parameters, $validator) {
        // Elimina guiones y convierte a mayúsculas
        $rut = strtoupper(str_replace("-", "", $value));
    
        // Verifica el formato básico del RUT
        if (!preg_match('/^[0-9]{7,8}[-Kk0-9]$/', $rut)) {
            return false;
        }
    
        // Extrae dígitos y dígito verificador
        $digitoVerificador = substr($rut, -1);
        $digitos = substr($rut, 0, -1);
    
        // Invierte los dígitos
        $digitosInvertidos = strrev($digitos);
    
        $suma = 0;
        $multiplicador = 2;
    
        // Calcula la suma ponderada de los dígitos
        for ($i = 0; $i < strlen($digitosInvertidos); $i++) {
            $suma += intval($digitosInvertidos[$i]) * $multiplicador;
            $multiplicador = ($multiplicador == 7) ? 2 : $multiplicador + 1;
        }
    
        // Calcula el módulo 11 de la suma
        $resto = $suma % 11;
    
        // Calcula el dígito verificador esperado
        $digitoEsperado = ($resto == 1) ? 'K' : (($resto == 0) ? '0' : strval(11 - $resto));
    
        // Compara el dígito verificador esperado con el proporcionado
        return $digitoEsperado === $digitoVerificador;
    });
    

    Validator::replacer('rut_chileno', function ($message, $attribute, $rule, $parameters) {
        return str_replace(':attribute', $attribute, 'El campo :attribute no es un RUT chileno válido.');
    });
}
}
