<?php

namespace App\Http\Controllers;

use App\Models\Material_materia;
use App\Models\Materias; // Make sure to import the Materia model
use App\Models\Tipo;   // Make sure to import the Tipo model
use Illuminate\Http\Request;


class Material_materiaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function publicIndex()
{
    $materiales = Material_materia::all();
    return view('crud.material_materia.public_index', compact('materiales'));
}

    public function index()
    {
        $materiales = Material_materia::all();
        $materias = Materias::all(); // Fetch all Materias
        $tipos = Tipo::all(); // Fetch all Tipos
        return view('crud.material_materia.index', compact('materiales', 'materias', 'tipos'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $materias = Materia::all(); // Fetch all Materias
        $tipos = Tipo::all(); // Fetch all Tipos
        return view('crud.material_materia.index', compact('materias', 'tipos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'descripcion' => 'required|string|max:255',
            'archivo' => 'required',
            'materia_id' => 'required|exists:materias,id',
            'tipo_id' => 'required|exists:tipos,id',
        ]);
    
        $archivo = $request->input('archivo');
    
        // Verifica si el archivo es una URL o un archivo cargado
        if (filter_var($archivo, FILTER_VALIDATE_URL)) {
            // Es una URL
            $material_materia = new Material_materia();
            $material_materia->descripcion = $request->descripcion;
            $material_materia->archivo = $archivo; // Guardar la URL
            $material_materia->materia_id = $request->materia_id;
            $material_materia->tipo_id = $request->tipo_id;
            $material_materia->save();
    
            return redirect()->route('material.index')->with('success', 'Material creado con éxito');
        } else {
            // Es un archivo, maneja la carga del archivo
            $extension = $request->file('archivo')->getClientOriginalExtension();
            if (in_array($extension, ['pdf'])) {
                // Almacena en 'public/pdfs'
                $path = $request->file('archivo')->store('pdfs', 'public'); // Especifica el disco 'public'
            } elseif (in_array($extension, ['mp4', 'avi', 'mpg', 'webm'])) {
                // Almacena en 'public/videos'
                $path = $request->file('archivo')->store('videos', 'public'); // Especifica el disco 'public'
            } else {
                return redirect()->back()->withErrors(['archivo' => 'Tipo de archivo no permitido.']);
            }
    
            $material_materia = new Material_materia();
            $material_materia->descripcion = $request->descripcion;
            $material_materia->archivo = $path; // Guardar la ruta del archivo
            $material_materia->materia_id = $request->materia_id;
            $material_materia->tipo_id = $request->tipo_id;
            $material_materia->save();
    
            return redirect()->route('material.index')->with('success', 'Material creado con éxito');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Material_materia $material_materia)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Material_materia $material_materia)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Material_materia $material_materia)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Material_materia $material_materia)
    {
        //
    }
}
