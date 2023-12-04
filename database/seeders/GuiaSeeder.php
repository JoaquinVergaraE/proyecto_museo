<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Guia;

class GuiaSeeder extends Seeder
{
    public function run()
    {
        Guia::create([
            'rut_guia' => '11111111-1',
            'nom_guia' => 'Juan Pérez',
        ]);

        Guia::create([
            'rut_guia' => '12345678-5',
            'nom_guia' => 'María Rodríguez',
        ]);

        Guia::create([
            'rut_guia' => '13579246-2',
            'nom_guia' => 'Pedro Gómez',
        ]);

    }
}
