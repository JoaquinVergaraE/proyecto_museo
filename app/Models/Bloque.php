<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bloque extends Model
{
    protected $table = 'bloques';
    protected $primaryKey = 'bloque'; // Clave primaria
    public $incrementing = true; // Desactiva la auto-incrementación de las claves primarias
    public $timestamps = false; // No se gestionarán automáticamente las marcas de tiempo

    protected $fillable = [
        'bloque',
        'hora_bloque',
    ];

    public function institucion()
    {
        return $this->hasMany(Reserva::class, 'bloque', 'bloque');
    }
}
