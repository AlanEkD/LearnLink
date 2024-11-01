<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SemestreCarrera extends Model
{
    use HasFactory;

    protected $table = 'semestre_carreras'; // Nombre de la tabla

    // Define las relaciones con las materias
    public function materia1()
    {
        return $this->belongsTo(Materias::class, 'materia_1');
    }

    public function materia2()
    {
        return $this->belongsTo(Materias::class, 'materia_2');
    }

    public function materia3()
    {
        return $this->belongsTo(Materias::class, 'materia_3');
    }

    public function materia4()
    {
        return $this->belongsTo(Materias::class, 'materia_4');
    }

    public function materia5()
    {
        return $this->belongsTo(Materias::class, 'materia_5');
    }

    public function materia6()
    {
        return $this->belongsTo(Materias::class, 'materia_6');
    }

    public function materia7()
    {
        return $this->belongsTo(Materias::class, 'materia_7');
    }

    public function materia8()
    {
        return $this->belongsTo(Materias::class, 'materia_8');
    }

    public function materia9()
    {
        return $this->belongsTo(Materias::class, 'materia_9');
    }

    public function materia10()
    {
        return $this->belongsTo(Materias::class, 'materia_10');
    }

    // Puedes agregar otras relaciones si es necesario
    public function carrera()
    {
        return $this->belongsTo(Carreras::class);
    }

    public function semestre()
    {
        return $this->belongsTo(Semestres::class);
    }
}
