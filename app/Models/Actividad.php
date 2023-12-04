<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Actividad extends Model
{
    protected $table = 'actividades';
    protected $primaryKey = 'cod_actividad'; // Clave primaria
    public $incrementing = false; // Desactiva la auto-incrementación de las claves primarias
    public $timestamps = false; // No se gestionarán automáticamente las marcas de tiempo

    protected $fillable = [
        'cod_actividad',
        'descripcion',
    ];

    public function institucion()
    {
        return $this->hasMany(Reserva::class, 'actividad', 'actividad');
    }

}
