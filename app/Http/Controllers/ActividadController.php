<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Actividad;
use App\Models\FechasActividad;
use App\Models\Bloque;
use Carbon\Carbon;
use Carbon\CarbonPeriod;

class ActividadController extends Controller
{
    public function mostrarActividades()
    {
        $actividades = Actividad::all();
        return view('principal', compact('actividades'));
    }

    public function obtenerDiasHabilesDiciembre()
    {
        Carbon::setLocale('es');
        $hoy = Carbon::now();
        $inicio = Carbon::createFromDate($hoy->year, 12, 1); // Primer día de diciembre
        $fin = $inicio->copy()->endOfMonth(); // Último día de diciembre
    
        $periodo = CarbonPeriod::create($inicio, $fin);
    
        // Obtener todos los días hábiles (de lunes a viernes)
        $diasHabiles = $periodo->filter(function ($date) use ($hoy) {
            return $date->isWeekday();
        });

        $diasFormateados = $diasHabiles->map(function ($date) use ($hoy) {
        $actividadesEnFecha = FechasActividad::where('fecha', $date->translatedFormat('Y-m-d'))->get();
        $cantidadActividades = $actividadesEnFecha->count();
    
        
        return [
            'fecha' => $date->translatedFormat('Y-m-d'),
            'ocultar' => $date->lessThan($hoy) || $cantidadActividades >= 3,
        ];
        });
    
        return $diasFormateados;
    }
    
    
    

    public function mostrarCalendarioDiasHabiles()
    {
        Carbon::setLocale('es');
        $diasHabiles = $this->obtenerDiasHabilesDiciembre(); // Usando la función anterior

        return view('principal', compact('diasHabiles'));
    }

    public function accionDia($fecha)
    {

    $fecha = $fecha;
    $actividadesAsociadas = FechasActividad::where('fecha', $fecha)->pluck('cod_actividad')->toArray();
    $actividades = Actividad::all();
    $actividadesFiltradas = $actividades->reject(function ($actividad) use ($actividadesAsociadas) {
        return in_array($actividad->cod_actividad, $actividadesAsociadas);
    });
    $bloques = Bloque::all();
    $cod_bloques = $bloques->pluck('cod_bloque');
    $fecha_cod = $actividades->pluck('cod_actividad');
    $descripcion = $actividades->pluck('descripcion');
    return view(
    'accion', compact('fecha','actividades','fecha_cod','descripcion','bloques','actividadesFiltradas'));
    }

    public function actividades(){
        $actividades = Actividad::all();
        return view('actividades', compact('actividades'));
    }
}
