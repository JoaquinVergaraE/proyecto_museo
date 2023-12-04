<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guia extends Model
{
    protected $table = 'guias';
    protected $primaryKey = 'rut_guia'; // Clave primaria
    public $incrementing = false; // Desactiva la auto-incrementación de las claves primarias
    public $timestamps = false; // No se gestionarán automáticamente las marcas de tiempo

    protected $fillable = [
        'rut_guia',
        'nom_guia',
    ];

    public function institucion()
    {
        return $this->hasMany(Reserva::class, 'rut_guia', 'rut_guia');
    }
}
