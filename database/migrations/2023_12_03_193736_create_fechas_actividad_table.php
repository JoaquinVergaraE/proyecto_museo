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
        Schema::create('fechas_actividad', function (Blueprint $table) {
            $table->increments('cod_fechas_actividad');
            $table->unsignedInteger('cod_actividad');
            $table->date('fecha');
        
            $table->foreign('cod_actividad')->references('cod_actividad')->on('actividades')->onDelete('cascade');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fechas_actividad');
    }
};
