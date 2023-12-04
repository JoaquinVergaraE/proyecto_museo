<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\Rule;
use App\Models\Encargado;
use App\Models\Institucion;
use App\Models\Grupo;
use App\Models\Reserva;
use App\Models\FechasActividad;
use Illuminate\Support\Arr;

class FormularioController extends Controller
{
    public function enviarFormulario(Request $request, $cod_bloque, $cod_actividad, $fecha)
    {

        $request->validate([
            'rut_encargado' => [
                'required',
                'string',
                'rut_chileno',
                Rule::unique('encargados', 'rut_encargado')->ignore(Encargado::class, 'rut_encargado'),
            ],
            'nom_encargado' => 'required|regex:/^[A-Za-z\s]+$/',
            'telefono_encargado' => 'required|regex:/^[0-9]{9}$/',
            'correo_encargado' => 'required|email',
            'nom_institucion' => 'required|regex:/^[A-Za-z\s]+$/',
            'direccion_institucion' => 'required|string',
            'comuna_institucion' => 'required|regex:/^[A-Za-z\s]+$/',
            'region_institucion' => 'required|regex:/^[A-Za-z\s]+$/',
            'telefono_institucion' => 'required|regex:/^[0-9]{9}$/',
            'correo_institucion' => 'required|email',
            'cantidad_niños' => 'required|numeric|min:0|max:30',
            'cantidad_niñas' => 'required|numeric|min:0|max:30',
            'cantidad_adultos' => 'required|numeric|min:0|max:30',
            'cantidad_adultas' => 'required|numeric|min:0|max:30',
        ], [
            'required' => 'El campo :attribute es obligatorio.',
            'rut_chileno' => 'El campo :attribute no es un RUT chileno valido.',
            'string' => 'El campo :attribute debe ser una cadena de texto.',
            'numeric' => 'El campo :attribute debe ser un número.',
            'min' => 'El campo :attribute debe ser al menos :min.',
            'max' => 'El campo :attribute no debe ser mayor que :max.',
            'email' => 'El campo :attribute debe ser una dirección de correo electrónico válida.',
            'alpha' => 'El campo :attribute debe contener solo letras.',
            'integer' => 'El campo :attribute debe ser un número entero.',
            'nom_encargado.regex' => 'El campo :attribute debe contener solo letras y espacios en blanco.',
            'nom_institucion.regex' => 'El campo :attribute debe contener solo letras y espacios en blanco.',
            'comuna_institucion.regex' => 'El campo :attribute debe contener solo letras y espacios en blanco.',
            'region_institucion.regex' => 'El campo :attribute debe contener solo letras y espacios en blanco.',
            'telefono_encargado.regex' => 'El campo :attribute debe tener exactamente 9 dígitos numéricos.',
            'telefono_institucion.regex' => 'El campo :attribute debe tener exactamente 9 dígitos numéricos.',
            'unique' => 'El :attribute ya existe.',

        ]);

    $encargado = new Encargado();
    $encargado->rut_encargado = $request->input('rut_encargado');
    $encargado->nom_encargado = $request->input('nom_encargado');
    $encargado->telefono = $request->input('telefono_encargado');
    $encargado->correo = $request->input('correo_encargado');
    $encargado->save();

    $institucion = new Institucion();
    $institucion->nom_institucion = $request->input('nom_institucion');
    $institucion->direccion = $request->input('direccion_institucion');
    $institucion->comuna = $request->input('comuna_institucion');
    $institucion->region = $request->input('region_institucion');
    $institucion->telefono = $request->input('telefono_institucion');
    $institucion->correo = $request->input('correo_institucion');
    $institucion->save();

    $fechaActividad = new FechasActividad();
    $fechaActividad->cod_actividad = $cod_actividad;
    $fechaActividad->fecha = $fecha;
    
    $fechaActividad->save();
    
    $ultimoCodInstitucion = Institucion::max('cod_institucion');

    $grupo = new Grupo();
    $grupo->cod_institucion = $ultimoCodInstitucion;
    $grupo->rut_encargado = $request->input('rut_encargado');
    $grupo->cantidad_niños = $request->input('cantidad_niños');
    $grupo->cantidad_niñas = $request->input('cantidad_niñas');
    $grupo->cantidad_adultos = $request->input('cantidad_adultos');
    $grupo->cantidad_adultas = $request->input('cantidad_adultas');
    $grupo->save();

    $ultimoCodGrupo = Grupo::max('cod_grupo');
    $rut_guias = ['11111111-1', '12345678-5', '13579246-2'];
    $azar_rut_guias = session('azar_rut_guias', null);
    $ruts_no_seleccionados = array_diff($rut_guias, [$azar_rut_guias]);
    $nuevo_azar_rut = Arr::random($ruts_no_seleccionados);
    session(['azar_rut_guias' => $nuevo_azar_rut]);


    $reserva = new Reserva();
    $reserva->cod_bloque = $cod_bloque;
    $reserva->cod_grupo = $ultimoCodGrupo;
    $reserva->rut_guia = $nuevo_azar_rut;
    $reserva->cod_actividad = $cod_actividad;
    $reserva->save();

    $request->session()->flash('success', 'Información guardada con éxito. Te llegara un correo con la informacion de tu reserva. Muchas gracias.');

    //return redirect()->route('mostrarCalendarioDiasHabiles')->with('success', 'Información guardada con éxito. Te llegara un correo con la informacion de tu reserva. Muchas gracias.');
    return redirect()->route('paginaDespuesDeGuardar')
                     ->header('Cache-Control', 'no-store, no-cache, must-revalidate, post-check=0, pre-check=0')
                     ->header('Pragma', 'no-cache')
                     ->header('Expires', 'Sat, 26 Jul 1997 05:00:00 GMT'); // Fecha en el pasado para asegurar que no se almacene en caché
    }
}

