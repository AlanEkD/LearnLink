<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Materia_carrera extends Model
{
    use HasFactory;

    protected $table = 'materia_carrera';

    protected $fillable = [
        'carrera_id',
        'materia_id',
    ];


    public function carrera()
    {
        return $this->belongsTo(Carreras::class, 'carrera_id');
    }

    public function materia()
    {
        return $this->belongsTo(Materias::class, 'materia_id');
    }




    

}
