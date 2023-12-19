<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Actividad;

class ActividadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Actividad::create([
            'descripcion' => 'Participar en un recorrido guiado por el museo, donde un experto o guía proporciona información detallada sobre las exhibiciones y obras de arte.',
            'titulo' => 'Recorrido Cultural: Descubre el Museo con un Guía Experto',
        ]);

        Actividad::create([
            'descripcion' => 'Participar en talleres educativos organizados por el museo, que pueden incluir actividades prácticas, demostraciones artísticas o actividades interactivas.',
            'titulo' => 'Talleres Educativos: Donde la Diversión se Encuentra con el Aprendizaje',
        ]);

        Actividad::create([
            'descripcion' => 'Asistir a proyecciones de películas, documentales o conferencias relacionadas con la temática del museo.',
            'titulo' => 'Encuentro Audiovisual: Películas y Documentales en el Museo',
        ]);

        Actividad::create([
            'descripcion' => 'Explorar áreas interactivas dentro del museo, que pueden incluir pantallas táctiles, juegos educativos o instalaciones multimedia.',
            'titulo' => 'Toque y Aprende: Áreas Interactivas para Todas las Edades',
        ]);
    }
}
