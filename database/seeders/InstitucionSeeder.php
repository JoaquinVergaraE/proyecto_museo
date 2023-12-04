<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Institucion;


class InstitucionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Institucion::create([
            'nom_institucion' => 'Colegio Marcelino',
            'direccion' => 'Julia Troncoso #1074',
            'comuna' => 'Limache',
            'region' => 'Valparaiso',
            'telefono' => '332863216',
            'correo' => 'colegio.marcelino@hotmail.com'
        ]);

        Institucion::create([
            'nom_institucion' => 'Colegio San Pedro Nolasco',
            'direccion' => 'Oliverio Barker #962',
            'comuna' => 'Quillota',
            'region' => 'Valparaiso',
            'telefono' => '332317756',
            'correo' => 'cspnq@hotmail.com'
        ]);

        Institucion::create([
            'nom_institucion' => 'Colegio Ingles de Calera',
            'direccion' => 'Pudeto #1065',
            'comuna' => 'La Calera',
            'region' => 'Valparaiso',
            'telefono' => '332794217',
            'correo' => 'colegio.ingles.lacalera@hotmail.com'
        ]);

        Institucion::create([
            'nom_institucion' => 'Instituto Alonso de Ercilla',
            'direccion' => 'Avda. Argentina #64',
            'comuna' => 'Valparaiso',
            'region' => 'Valparaiso',
            'telefono' => '332863217',
            'correo' => 'instituto.ae@hotmail.com'
        ]);
    }
}
