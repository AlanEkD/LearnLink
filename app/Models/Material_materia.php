<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Material_materia extends Model
{
    use HasFactory;

    protected $table = 'material_materia';

    protected $fillable = [
        'descripcion',
        'archivo',
        'materia_id',
        'tipo_id',
    ];


    public function materia()
    {
        return $this->belongsTo(Materias::class, 'materia_id');
    }

    public function tipo()
    {
        return $this->belongsTo(Tipo::class, 'tipo_id');
    }

}
