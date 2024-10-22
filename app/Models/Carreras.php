<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Carreras extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'facultad_id'
    ];

    public function facultad(): BelongsTo
    {
        return $this->belongsTo(Facultades::class, 'facultad_id');
    }

    public function materias()
    {
        return $this->hasMany(Materias::class);
    }


    
    
}
