<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Actividad;
use App\Models\FechasActividad;
use App\Models\Bloque;
use App\Models\Reserva;
use App\Models\Grupo;
use App\Models\Encargado;
use App\Models\Guia;
use App\Models\Institucion;
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
            'numeroDia' => $date->translatedFormat('d'), // 'd' representa el día del mes
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
    $fechaCarbon = Carbon::parse($fecha);
    $fechaCarbon->setLocale('es');
    $fechaFormateada = $fechaCarbon->isoFormat('dddd D [de] MMMM');

    $actividadesAsociadas = FechasActividad::where('fecha', $fecha)->pluck('cod_actividad')->toArray();
    $actividades = Actividad::all();
    $actividadesFiltradas = $actividades->reject(function ($actividad) use ($actividadesAsociadas) {
        return in_array($actividad->cod_actividad, $actividadesAsociadas);
    });

    $ultimaFechaActividad = FechasActividad::max('cod_fechas_actividad');
    $ultimaFecha = FechasActividad::where('cod_fechas_actividad', $ultimaFechaActividad)->value('fecha');
    $ultimaFechaCarbon = Carbon::parse($ultimaFecha);
    $ultimaFechaCarbon->setLocale('es');
    $ultimaFechaCarbonFormateada = $ultimaFechaCarbon->isoFormat('dddd D [de] MMMM');

    $cod_actividad_rojo = FechasActividad::where('cod_fechas_actividad', $ultimaFechaActividad)->value('cod_actividad');
    $ultimaReserva = Reserva::max('cod_reserva');
    $ultimoBloque = Reserva::where('cod_reserva', $ultimaReserva)->value('cod_bloque');
    $horaBloqueRojo = Bloque::where('cod_bloque', $ultimoBloque)->value('cod_bloque');

    $bloques = Bloque::all();
    $cod_bloques = $bloques->pluck('cod_bloque');
    $fecha_cod = $actividades->pluck('cod_actividad');
    $descripcion = $actividades->pluck('descripcion');
    $titulo = $actividades->pluck('titulo');
    return view('accion', compact('fecha','actividades','fecha_cod','descripcion','bloques','actividadesFiltradas', 'fechaFormateada', 'titulo', 'cod_actividad_rojo', 'horaBloqueRojo', 'ultimaFecha', 'actividadesAsociadas'));
    }

    public function actividades(){
        $actividades = Actividad::all();
        return view('actividades', compact('actividades'));
    }

    public function cambiarFecha($fecha)
    {
        // Convertir la fecha a un objeto Carbon
        $carbonFecha = Carbon::parse($fecha);

        // Formatear la fecha solo como día (por ejemplo, 'd' representa el día)
        $nuevaFecha = $carbonFecha->format('d');

        return $nuevaFecha;
    }

    public function paginaDespuesDeGuardar(){
        $ultimaReserva = Reserva::max('cod_reserva');
        $ultimaFecha = FechasActividad::max('cod_fechas_actividad');
        $fecha = FechasActividad::where('cod_fechas_actividad', $ultimaFecha)->value('fecha');
        $ultimoBloque = Reserva::where('cod_reserva', $ultimaReserva)->value('cod_bloque');
        $horaBloque = Bloque::where('cod_bloque', $ultimoBloque)->value('hora_bloque');
        $ultimaActividad = Reserva::where('cod_reserva', $ultimaReserva)->value('cod_actividad');
        $actividad = Actividad::where('cod_actividad', $ultimaActividad)->value('titulo');
        $ultimoGuia = Reserva::where('cod_reserva', $ultimaReserva)->value('rut_guia');
        $guia = Guia::where('rut_guia', $ultimoGuia)->value('nom_guia');
        $ultimoGrupo = Grupo::max('cod_grupo');
        $ultimoEncargado = Grupo::where('cod_grupo', $ultimoGrupo)->value('rut_encargado');
        $encargado = Encargado::where('rut_encargado', $ultimoEncargado)->value('nom_encargado');
        $ultimaInstitucion = Grupo::max('cod_institucion');
        $institucion = Institucion::where('cod_institucion', $ultimaInstitucion)->value('nom_institucion');
        $ultimoCantidadNinosNinas = Grupo::where('cod_grupo', $ultimoGrupo)->value('cantidad_ninos_ninas');
        $ultimoCantidadAdultosAdultas = Grupo::where('cod_grupo', $ultimoGrupo)->value('cantidad_adultos_adultas');

        return view('paginaDespuesDeGuardar', compact('ultimaReserva', 'fecha', 'horaBloque', 'actividad', 'guia', 'encargado', 'institucion', 'ultimoCantidadNinosNinas', 'ultimoCantidadAdultosAdultas' ));
    }

    public function actualizarDescripcion(Request $request)
    {
        $codActividad = $request->input('cod_actividad');
        $nuevaDescripcion = $request->input('nueva_descripcion');

        // Realizar la actualización en la base de datos
        Actividad::where('cod_actividad', $codActividad)->update(['descripcion' => $nuevaDescripcion]);

        return response()->json(['message' => 'Actualización exitosa']);
    }

}
