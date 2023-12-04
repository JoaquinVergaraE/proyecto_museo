<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Institucion extends Model
{
    protected $table = 'instituciones';
    protected $primaryKey = 'cod_institucion'; // Clave primaria
    public $incrementing = false;
    public $timestamps = false; // No se gestionarán automáticamente las marcas de tiempo

    protected $fillable = [
        'cod_institucion',
        'nom_institucion',
        'direccion',
        'comuna',
        'region',
        'telefono',
        'correo',
    ];

    public function grupos()
    {
        return $this->hasMany(Grupo::class, 'cod_institucion', 'cod_institucion');
    }
}