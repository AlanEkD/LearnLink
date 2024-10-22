<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tipo_materia;

class TipoMateriaController extends Controller
{
    public function index(){
    $i = 1;
        $tipo_materias = Tipo_materia::all();
        return view("crud.tipo_materias.tipo_materia", compact("tipo_materias","i"));
    }
    
    public function store(Request $request){
        $request->validate([
            'nombre' => 'required|string|max:255',
        ]);
        $tipo_materias = new Tipo_materia();
        $tipo_materias->nombre = $request->nombre;
        $tipo_materias->save();
        return redirect()->back()->with("success","Tipo de materia creada exitosamente."); 
    }

    public function update(Request $request, string $id)
    {
        // Validar los datos de entrada
        $request->validate([
            'nombre' => 'required|string|max:255',
        ]);
    
        // Buscar la tipo_materias por ID
        $tipo_materias = Tipo_materia::find($id);
    
        // Comprobar si la tipo_materias existe
        if (!$tipo_materias) {
            return redirect()->route('tipo_materias.index')->with('error', 'Tipo_materias no encontrada');
        }
    
        // Actualizar los datos de la tipo_materias
        $tipo_materias->nombre = $request->input('nombre');
        $tipo_materias->save();
    
        // Redireccionar a la lista de tipo_materias con un mensaje de éxito
        return redirect()->route('tipo_materias.index')->with('success', 'Tipo_materias actualizada correctamente');
    }

    public function destroy(string $id)
    {
        // Encuentra la tipo_materias por su ID
        $tipo_materias = Tipo_materia::find($id);
        
        // Verifica si se encontró la tipo_materias
        if ($tipo_materias) {
            // Elimina la tipo_materias
            $tipo_materias->delete();

            // Redirecciona con un mensaje de éxito
            return redirect()->route('tipo_materias.index')->with('success', 'tipo_materias eliminada correctamente.');
        }

        // Si no se encuentra, redirecciona con un mensaje de error
        return redirect()->route('tipo_materias.index')->with('error', 'tipo_materias no encontrada.');
    }





}
