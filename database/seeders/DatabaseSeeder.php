<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(InstitucionSeeder::class);
        $this->call(EncargadoSeeder::class);
        $this->call(GuiaSeeder::class);
        $this->call(ActividadSeeder::class);
        $this->call(BloqueSeeder::class);
        $this->call(GrupoSeeder::class);
        $this->call(ReservaSeeder::class);
        $this->call(fechasActividadSeeder::class);
        $this->call(UsersSeeder::class);
    }
}
