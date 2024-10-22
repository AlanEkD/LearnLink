<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Facultades;

class FacultadesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $i = 1;
        $facultades = Facultades::all();
        return view('crud.facultades.facultades',compact('facultades','i'));
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
        // para hacer validaciones
        $request->validate([
            'nombre' => 'required|string|max:255',
        ]);

        $facultad = new Facultades(); // Llamando a la funcion para crear un nuevo objeto
        $facultad->nombre = $request->nombre;
        $facultad->save();// guardar el elemento en la base de datos

        return redirect()->back()->with('success', 'Facultad creada exitosamente.');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validar los datos de entrada
        $request->validate([
            'nombre' => 'required|string|max:255',
        ]);
    
        // Buscar la facultad por ID
        $facultad = Facultades::find($id);
    
        // Comprobar si la facultad existe
        if (!$facultad) {
            return redirect()->route('facultades.index')->with('error', 'Facultad no encontrada');
        }
    
        // Actualizar los datos de la facultad
        $facultad->nombre = $request->input('nombre');
        $facultad->save();
    
        // Redireccionar a la lista de facultades con un mensaje de éxito
        return redirect()->route('facultades.index')->with('success', 'Facultad actualizada correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Encuentra la facultad por su ID
        $facultad = Facultades::find($id);
        
        // Verifica si se encontró la facultad
        if ($facultad) {
            // Elimina la facultad
            $facultad->delete();

            // Redirecciona con un mensaje de éxito
            return redirect()->route('facultades.index')->with('success', 'Facultad eliminada correctamente.');
        }

        // Si no se encuentra, redirecciona con un mensaje de error
        return redirect()->route('facultades.index')->with('error', 'Facultad no encontrada.');
    }
}
