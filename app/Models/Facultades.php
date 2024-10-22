<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Facultades extends Model
{
    use HasFactory;


    protected $fillable = [
        'nombre'
    ];

    public function carreras(): HasMany{
        return $this->hasMany(Carreras::class,'facultad_id');
    }
  


}
