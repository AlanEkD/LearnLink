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
        Schema::create('semestre_carreras', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('carrera_id');
            $table->unsignedBigInteger('semestre_id');
            $table->unsignedBigInteger('materia_1')->references('id')->on('materias')->nullable();
            $table->unsignedBigInteger('materia_2')->references('id')->on('materias')->nullable();
            $table->unsignedBigInteger('materia_3')->references('id')->on('materias')->nullable();
            $table->unsignedBigInteger('materia_4')->references('id')->on('materias')->nullable();
            $table->unsignedBigInteger('materia_5')->references('id')->on('materias')->nullable();
            $table->unsignedBigInteger('materia_6')->references('id')->on('materias')->nullable();
            $table->unsignedBigInteger('materia_7')->references('id')->on('materias')->nullable();
            $table->unsignedBigInteger('materia_8')->references('id')->on('materias')->nullable();
            $table->unsignedBigInteger('materia_9')->references('id')->on('materias')->nullable();
            $table->unsignedBigInteger('materia_10')->references('id')->on('materias')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('semestre_carreras');
    }
};
