<?php

namespace App\Http\Controllers;

use App\Models\Carreras;
use App\Models\Facultades;

use Illuminate\Http\Request;

class CarrerasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        $i = 1;
        $facultades = Facultades::all(); // Obtener todas las facultades

        $carreras = Carreras::all(); // Obtener todas las carreras
        return view('crud.carreras.carreras', compact('carreras','i','facultades')); // Pasar las carreras a la vista
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $facultades = Facultades::all(); // Obtener todas las facultades
        return view('crud.carreras.crear',compact('facultades'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validar los datos del formulario
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'facultad_id' => 'required|exists:facultades,id', // Validar que el ID de la facultad exista
        ]);;

        // Crear una nueva carrera en la base de datos
        Carreras::create([
            'nombre' => $validated['nombre'],
            'facultad_id' => $validated['facultad_id'], // Usar el ID de la facultad del formulario
        ]);

        // Redirigir o mostrar un mensaje de éxito
        return redirect()->route('carreras.index')->with('success', 'Carrera creada exitosamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Carreras $carreras)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Carreras $carreras)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Carreras $carreras)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Carreras $carreras)
    {
        //
    }
}
