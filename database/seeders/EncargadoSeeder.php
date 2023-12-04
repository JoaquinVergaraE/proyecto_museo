<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Encargado;

class EncargadoSeeder extends Seeder
{
    public function run()
    {
        // Generar encargados de ejemplo
        Encargado::create([
            'rut_encargado' => '17492365-5',
            'nom_encargado' => 'Juan Pérez',
            'telefono' => '924601853',
            'correo' => 'juan_perez@hotmail.com',
        ]);

        Encargado::create([
            'rut_encargado' => '19327431-5',
            'nom_encargado' => 'María Rodríguez',
            'telefono' => '985683267',
            'correo' => 'maria_rodriguez@hotmail.com',
        ]);

        Encargado::create([
            'rut_encargado' => '18459001-8',
            'nom_encargado' => 'Pedro Gómez',
            'telefono' => '902146931',
            'correo' => 'pedro_gomez@hotmail.com',
        ]);

        // Puedes agregar más encargados según sea necesario
    }
}