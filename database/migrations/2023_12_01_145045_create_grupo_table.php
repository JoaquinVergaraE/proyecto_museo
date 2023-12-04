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
        Schema::create('grupos', function (Blueprint $table) {
            $table->increments('cod_grupo'); 
            $table->unsignedInteger('cod_institucion'); 
            $table->string('rut_encargado'); 
            $table->integer('cantidad_niños');
            $table->integer('cantidad_niñas');
            $table->integer('cantidad_adultos');
            $table->integer('cantidad_adultas');
    
            $table->foreign('cod_institucion')->references('cod_institucion')->on('instituciones')->onDelete('restrict');
            $table->foreign('rut_encargado')->references('rut_encargado')->on('encargados')->onDelete('restrict');
        });
    }
    
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('grupos');
    }
};    
