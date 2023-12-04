<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\fechasActividad;

class fechasActividadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        fechasActividad::create([
            'cod_actividad' => '3',
            'fecha' => '2023-12-25',
        ]);
        fechasActividad::create([
            'cod_actividad' => '2',
            'fecha' => '2023-12-25',
        ]);
        fechasActividad::create([
            'cod_actividad' => '1',
            'fecha' => '2023-12-25',
        ]);
        fechasActividad::create([
            'cod_actividad' => '3',
            'fecha' => '2023-12-08',
        ]);
        fechasActividad::create([
            'cod_actividad' => '2',
            'fecha' => '2023-12-08',
        ]);
        fechasActividad::create([
            'cod_actividad' => '1',
            'fecha' => '2023-12-08',
        ]);
        fechasActividad::create([
            'cod_actividad' => '3',
            'fecha' => '2023-12-31',
        ]);
        fechasActividad::create([
            'cod_actividad' => '4',
            'fecha' => '2023-12-31',
        ]);
        fechasActividad::create([
            'cod_actividad' => '2',
            'fecha' => '2023-12-31',
        ]);
    }
}
