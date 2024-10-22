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
        Schema::create('materia_carrera',function(Blueprint $table){
            $table->id();
            $table->unsignedBigInteger('carrera_id'); // Define la columna foránea
            $table->unsignedBigInteger('materia_id'); // Define la columna foránea
            $table->timestamps(); // Esto agrega las columnas created_at y updated_at

            $table->foreign('carrera_id')->references('id')->on('carreras')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('materia_id')->references('id')->on('materias')->onDelete('cascade')->onUpdate('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('materia_carrera'); 

    }
};
