<?php

namespace App\Http\Controllers;

use App\Models\Carreras;
use App\Models\Facultades;
use App\Models\Semestres;
use App\Models\Materias;
use App\Models\Tipo_materia;
use App\Models\SemestreCarrera;

use Illuminate\Http\Request;

class CarrerasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function publicIndex()
    {
        $i = 1;
        $facultades = Facultades::all();
        $materias = Materias::all();
        $carreras = Carreras::all();
        $tiposMaterias = Tipo_materia::all();
        $semestres = Semestres::all();
        $semestreCarreras = SemestreCarrera::with(['carrera', 'semestre', 'materia1', 'materia2', 'materia3', 'materia4', 'materia5', 'materia6', 'materia7', 'materia8', 'materia9', 'materia10'])->get();
        return view('Facultades.indexRed', compact('facultades','materias','carreras', 'tiposMaterias','semestreCarreras', 'i'));
    }

    public function show($id)
    {
    // Obtener la carrera con sus semestres y materias
    $carreras = Carreras::with('semestres.materias')->findOrFail($id);

    // Retornar la vista con la información de la carrera
    return view('Facultades.indexRed', compact('carreras'));
    }

}
