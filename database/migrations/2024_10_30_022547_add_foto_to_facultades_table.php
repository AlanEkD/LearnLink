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
    Schema::table('facultades', function (Blueprint $table) {
        $table->string('foto')->nullable(); // Añade la columna 'foto' que puede ser nula
    });
}

public function down(): void
{
    Schema::table('facultades', function (Blueprint $table) {
        $table->dropColumn('foto'); // Eliminar la columna en caso de rollback
    });
}

};
