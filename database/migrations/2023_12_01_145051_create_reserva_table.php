<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('reservas', function (Blueprint $table) {
            $table->increments('cod_reserva'); 
            $table->unsignedInteger('cod_bloque'); 
            $table->unsignedInteger('cod_grupo');
            $table->string('rut_guia'); 
            $table->unsignedInteger('cod_actividad');

            $table->foreign('cod_bloque')->references('cod_bloque')->on('bloques')->onDelete('restrict');
            $table->foreign('cod_grupo')->references('cod_grupo')->on('grupos')->onDelete('restrict');
            $table->foreign('rut_guia')->references('rut_guia')->on('guias')->onDelete('restrict');
            $table->foreign('cod_actividad')->references('cod_actividad')->on('actividades')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservas');
    }
};
