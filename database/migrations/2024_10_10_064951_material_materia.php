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
        Schema::create('material_materia',function(Blueprint $table){
            $table->id();
            $table->string('descripcion');
            $table->string('archivo');
            $table->unsignedBigInteger('materia_id'); // Define la columna foránea
            $table->unsignedBigInteger('tipo_id'); // Define la columna foránea
            $table->timestamps(); // Esto agrega las columnas created_at y updated_at

            $table->foreign('materia_id')->references('id')->on('materias')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('tipo_id')->references('id')->on('tipos')->onDelete('cascade')->onUpdate('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('material_carrera'); 

    }
};
