<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Grupo;

class GrupoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Grupo::create([
            'cod_institucion' => 1,
            'rut_encargado' => '19327431-5',
            'cantidad_niños' => 10,
            'cantidad_niñas' => 20,
            'cantidad_adultos' => 0,
            'cantidad_adultas' => 0
        ]);
    }
}
