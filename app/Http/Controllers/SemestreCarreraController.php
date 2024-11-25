<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SemestreCarrera;
use App\Models\Materias;
use App\Models\Carreras; // Asegúrate de tener el modelo Carrera
use App\Models\Semestres;

class SemestreCarreraController extends Controller
{
    public function publicIndex()
    {
        // Obtener todos los semestres y materias disponibles
        $semestres = Semestres::all(); // Esto puede que necesites ajustar según tu estructura
        $materias = Materias::all();
        $carreras = Carreras::all(); // Obtener todas las carreras
        $semestreCarreras = SemestreCarrera::with(['carrera', 'semestre', 'materia1', 'materia2', 'materia3', 'materia4', 'materia5', 'materia6', 'materia7', 'materia8', 'materia9', 'materia10'])->get();
        return view('Carreras.algo', compact('semestres', 'materias', 'carreras','semestreCarreras'));
    }

    public function index()
    {
        // Obtener todos los semestres y materias disponibles
        $semestres = Semestres::all(); // Esto puede que necesites ajustar según tu estructura
        $materias = Materias::all();
        $carreras = Carreras::all(); // Obtener todas las carreras
        $semestreCarreras = SemestreCarrera::with(['carrera', 'semestre', 'materia1', 'materia2', 'materia3', 'materia4', 'materia5', 'materia6', 'materia7', 'materia8', 'materia9', 'materia10'])->get();
        return view('semestre_carreras.index', compact('semestres', 'materias', 'carreras','semestreCarreras'));
    }

    public function asignarMaterias(Request $request)
    {
        $request->validate([
            'carrera_id' => 'required|exists:carreras,id', // Validación para carrera
            'semestre_id' => 'required|exists:semestres,id',
            'materias' => 'array|max:10',
            'materias.*' => 'exists:materias,id',
        ]);


        $semestreCarrera = new SemestreCarrera();

        // Asignar la carrera
        $semestreCarrera->semestre_id = $request->semestre_id;
        $semestreCarrera->carrera_id = $request->carrera_id;

        // Asignar las materias
        foreach ($request->materias as $index => $materiaId) {
            if ($index < 10) { // Asegúrate de que no se excedan las 10 materias
                $semestreCarrera->{'materia_' . ($index + 1)} = $materiaId;
            }
        }

        $semestreCarrera->save();

        return redirect()->back()->with('success', 'Materias y carrera asignadas exitosamente.');
    }
}
