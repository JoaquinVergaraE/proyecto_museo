<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Grupo extends Model
{
    protected $table = 'grupos';
    protected $primaryKey = 'cod_grupo'; // Clave primaria
    public $incrementing = false; // Desactiva la auto-incrementación de las claves primarias
    public $timestamps = false; // No se gestionarán automáticamente las marcas de tiempo

    protected $fillable = [
        'cod_grupo',
        'cod_institucion',
        'rut_encargado',
        'cantidad_ninos_ninas',
        'cantidad_adultos_adultas',
    ];

    public function institucion()
    {
        return $this->belongsTo(Institucion::class, 'cod_institucion', 'cod_institucion');
    }

    public function encargado()
    {
        return $this->belongsTo(Encargado::class, 'rut_encargado', 'rut_encargado');
    }

    public function reserva()
    {
        return $this->hasMany(Reserva::class, 'cod_grupo', 'cod_grupo');
    }
}