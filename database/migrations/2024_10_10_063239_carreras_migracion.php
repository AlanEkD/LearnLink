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
        Schema::create('carreras',function(Blueprint $table){
            $table->id();
            $table->string('nombre');
            $table->unsignedBigInteger('facultad_id'); // Define la columna foránea
            $table->timestamps(); // Esto agrega las columnas created_at y updated_at

            $table->foreign('facultad_id')->references('id')->on('facultades')->onDelete('cascade')->onUpdate('cascade');
        
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carreras'); 
    }
};
