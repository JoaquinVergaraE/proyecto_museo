<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Reserva;

class ReservaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Reserva::create([
            'cod_bloque' => 4,
            'cod_grupo' => 1,
            'rut_guia' => '13579246-2',
            'cod_actividad' => 3
        ]);
    }
}
