<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Semestres extends Model
{
    protected $table = 'semestres';
    protected $fillable = ['nombre'];


    public function materias()
    {
        return $this->hasMany(Materias::class);
    }

    public function carreras()
    {
        return $this->belongsToMany(Carreras::class, 'carrera_semestre');
    }

    

}
