<?php

namespace App\Http\Controllers;

use App\Models\Materia_carrera;
use Illuminate\Http\Request;
use App\Models\Materias;
use App\Models\Carreras;
use App\Models\Tipo_materia;

class Materia_carreraController extends Controller
{
    
    public function index()
    {
        $i = 1;
        $materias_carrera = Materia_carrera::all();
        $materias = Materias::all();
        $carreras = Carreras::all();
        $tiposMaterias = Tipo_materia::all();
        return view('crud.materias_carrera.index', compact('materias_carrera','materias','carreras', 'tiposMaterias','i'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $materia_carrera = new Materia_carrera();
        $materia_carrera->materia_id = $request->materia_id;
        $materia_carrera->carrera_id = $request->carrera_id;
        $materia_carrera->save();
        return redirect()->route('carrera_materia.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Materia_carrera $materia_carrera)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Materia_carrera $materia_carrera)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Materia_carrera $materia_carrera)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Materia_carrera $materia_carrera)
    {
        //
    }
}
