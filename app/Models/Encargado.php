<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Encargado extends Model
{
    protected $table = 'encargados';
    protected $primaryKey = 'rut_encargado'; // Clave primaria
    public $timestamps = false; // No se gestionarán automáticamente las marcas de tiempo
    public $incrementing = false;

    protected $fillable = [
        'rut_encargado',
        'nom_encargado',
        'telefono',
        'correo',
    ];

    public function grupos()
    {
        return $this->hasMany(Grupo::class, 'rut_encargado', 'rut_encargado');
    }
}
