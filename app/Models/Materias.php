<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Materias extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'descripcion',
        'creditos',
        'tipo_materia_id',
    ];

    protected $table = 'materias';

    public function carreras()
    {
        return $this->belongsTo(Carreras::class);
    }

    public function materia()
    {
        return $this->belongsTo(Carreras::class, 'carrera_id');
    }

    public function tipo_materia()
    {
        return $this->belongsTo(Tipo_materia::class, 'tipo_materia_id');
    }

    public function semestres()
    {
        return $this->belongsToMany(Semestres::class, 'materia_semestre');
    }
}
