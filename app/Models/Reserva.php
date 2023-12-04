<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    protected $table = 'reservas';
    protected $primaryKey = 'cod_reserva'; // Clave primaria
    public $incrementing = false; // Desactiva la auto-incrementación de las claves primarias
    public $timestamps = false; // No se gestionarán automáticamente las marcas de tiempo

    protected $fillable = [
        'cod_reserva',
        'cod_bloque',
        'cod_grupo',
        'rut_guia',
        'cod_actividad',
    ];

    public function bloque()   
    {
        return $this->belongsTo(Bloque::class, 'cod_bloque', 'cod_bloque');
    }

    public function grupo()
    {
        return $this->belongsTo(Grupo::class, 'cod_grupo', 'cod_grupo');
    }

    public function guia()
    {
        return $this->belongsTo(Guia::class, 'rut_guia', 'rut_guia');
    }

    public function actividad()
    {
        return $this->belongsTo(Actividad::class, 'cod_actividad', 'cod_actividad');
    }

    
}
