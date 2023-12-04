<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Bloque;

class BloqueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Bloque::create([
            'hora_bloque' => '09:00-10:00',
        ]);

        Bloque::create([
            'hora_bloque' => '10:30-11:30',
        ]);

        Bloque::create([
            'hora_bloque' => '13:30-14:30',
        ]);

        Bloque::create([
            'hora_bloque' => '15:00-16:00',
        ]);

    }
}
