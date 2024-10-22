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
        Schema::create('materias',function(Blueprint $table){
            $table->id();
            $table->string('nombre');
            $table->string('descripcion');
            $table->string('creditos');
            $table->unsignedBigInteger('tipo_materia_id');
            $table->foreign('tipo_materia_id')->references('id')->on('tipo_materias')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps(); // Esto agrega las columnas created_at y updated_at

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('materias'); 

    }
};
