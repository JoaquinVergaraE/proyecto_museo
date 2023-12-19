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
            'telefono_encargado' => '|regex:/^[0-9]{9}$/',
            'correo_encargado' => 'required|email',
            'nom_institucion' => 'required|regex:/^[A-Za-z\s]+$/',
            'direccion_institucion' => 'required|string',
            'comuna_institucion' => 'required|regex:/^[A-Za-z\s]+$/',
            'region_institucion' => 'required|regex:/^[A-Za-z\s]+$/',
            'telefono_institucion' => '|regex:/^[0-9]{9}$/',
            'correo_institucion' => 'required|email',
            'cantidad_ninos_ninas' => 'required|numeric|min:0|max:40',
            'cantidad_adultos_adultas' => 'required|numeric|min:0|max:40',
        ], [
            'required' => 'El campo es obligatorio.',
            'rut_chileno' => 'El campo no es un RUT chileno valido.',
            'string' => 'El campo debe ser solo letras, guiones y números.',
            'numeric' => 'El campo debe ser solo números.',
            'min' => 'El campo debe tener al menos :min personas.',
            'max' => 'El campo no debe ser mayor que :max personas.',
            'email' => 'El campo debe ser una dirección de correo electrónico válida.',
            'alpha' => 'El campo debe contener solo letras.',
            'integer' => 'El campo debe contener solo números.',
            'nom_encargado.regex' => 'El campo debe contener solo letras y espacios en blanco.',
            'nom_institucion.regex' => 'El campo debe contener solo letras y espacios en blanco.',
            'comuna_institucion.regex' => 'El campo debe contener solo letras y espacios en blanco.',
            'region_institucion.regex' => 'El campo debe contener solo letras y espacios en blanco.',
            'telefono_encargado.regex' => 'El campo debe tener exactamente 9 dígitos numéricos.',
            'telefono_institucion.regex' => 'El campo debe tener exactamente 9 dígitos numéricos.',
            'unique' => 'El dato que ingreso ya existe.',

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
    $grupo->cantidad_ninos_ninas = $request->input('cantidad_ninos_ninas');
    $grupo->cantidad_adultos_adultas = $request->input('cantidad_adultos_adultas');
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
    return redirect()->action([ActividadController::class, 'paginaDespuesDeGuardar'])
                     ->header('Cache-Control', 'no-store, no-cache, must-revalidate, post-check=0, pre-check=0')
                     ->header('Pragma', 'no-cache')
                     ->header('Expires', 'Sat, 26 Jul 1997 05:00:00 GMT'); // Fecha en el pasado para asegurar que no se almacene en caché
    }
}