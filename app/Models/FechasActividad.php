<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FechasActividad extends Model
{
    protected $table = 'fechas_Actividad';
    protected $primaryKey = 'cod_fechas_actividad';
    public $incrementing = false;
    public $timestamps = false; // No se gestionarán automáticamente las marcas de tiempo
    protected $fillable = [
        'cod_fechas_actividad',
        'cod_actividad',
        'fecha',
        ];

    public function actividad()
    {
        return $this->belongsTo(Actividad::class, 'cod_actividad', 'cod_actividad');
    }
}