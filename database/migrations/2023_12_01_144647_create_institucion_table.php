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
        Schema::create('instituciones', function (Blueprint $table) {
            $table->increments('cod_institucion'); 
            $table->string('nom_institucion');
            $table->string('direccion'); 
            $table->string('comuna'); 
            $table->string('region'); 
            $table->string('telefono'); 
            $table->string('correo')->email();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('instituciones');
    }
};
