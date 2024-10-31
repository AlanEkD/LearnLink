<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Facultades;

class FacultadesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function publicIndex()
{
    $i = 1;
    $facultades = Facultades::all();
    return view('welcome', compact('facultades', 'i'));
}
    public function index()
    {
        $i = 1;
        $facultades = Facultades::all(); // Obtén todas las facultades desde la base de datos
        return view('crud.facultades.facultades', compact('facultades', 'i')); // Pasa las facultades a la vista
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Mostrar el formulario de creación (si es necesario)
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validar el nombre y la imagen
        $request->validate([
            'nombre' => 'required|string|max:255',
            'foto' => 'nullable|image|mimes:png|max:2048', // Validación para la imagen (formato PNG y tamaño máximo 2MB)
        ]);

        // Crear una nueva instancia de Facultades
        $facultad = new Facultades();
        $facultad->nombre = $request->nombre;

        // Si se cargó una foto, guárdala
        if ($request->hasFile('foto')) {
            $fileName = time() . '.' . $request->foto->extension(); // Crear un nombre único para la imagen
            $request->foto->move(public_path('images/facultades'), $fileName); // Guardar la imagen en el directorio público
            $facultad->foto = $fileName; // Guardar el nombre del archivo en la base de datos
        }

        // Guardar el nuevo registro
        $facultad->save();

        // Redireccionar de vuelta con un mensaje de éxito
        return redirect()->back()->with('success', 'Facultad creada exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Mostrar una facultad específica
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Mostrar el formulario de edición
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validar el nombre y la imagen
        $request->validate([
            'nombre' => 'required|string|max:255',
            'foto' => 'nullable|image|mimes:png|max:2048', // Validación para la imagen (formato PNG y tamaño máximo 2MB)
        ]);

        // Buscar la facultad por ID
        $facultad = Facultades::find($id);

        if (!$facultad) {
            return redirect()->route('facultades.index')->with('error', 'Facultad no encontrada');
        }

        // Actualizar los datos
        $facultad->nombre = $request->input('nombre');

        // Si se cargó una nueva foto, reemplazarla
        if ($request->hasFile('foto')) {
            $fileName = time() . '.' . $request->foto->extension();
            $request->foto->move(public_path('images/facultades'), $fileName);
            $facultad->foto = $fileName;
        }

        // Guardar los cambios
        $facultad->save();

        return redirect()->route('facultades.index')->with('success', 'Facultad actualizada correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Buscar la facultad por su ID y eliminarla
        $facultad = Facultades::find($id);
        
        if ($facultad) {
            $facultad->delete();
            return redirect()->route('facultades.index')->with('success', 'Facultad eliminada correctamente.');
        }

        return redirect()->route('facultades.index')->with('error', 'Facultad no encontrada.');
    }
}
