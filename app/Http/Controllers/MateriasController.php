<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Materias;
use App\Models\Carreras;
use App\Models\Tipo_materia;


class MateriasController extends Controller
{
   public function index()
   {    
        $i = 1;
       $materias = Materias::all();
       $carreras = Carreras::all();
       $tiposMaterias = Tipo_materia::all();
       return view('crud.materias.materias', compact('materias','carreras', 'tiposMaterias','i'));
   }


    // public function create()
    // {
    //      return view('crud.materias.create');
    // }

    public function store(Request $request)
    {
        // $request->validate([
        //     'nombre' => 'required|string|max:255',
        //     'descripcion' => 'required|string|max:255',
        //     'creditos' => 'required|integer|max:255',
        //     'tipo_materia_id' => 'required|integer',
        // ]);
        $materias = new Materias();
        $materias->nombre = $request->nombre;
        $materias->descripcion = $request->descripcion;
        $materias->creditos = $request->creditos;
        $materias->tipo_materia_id = $request->tipo_materia_id;

        if($materias->save()){
            return redirect()->route('materias.index')->with('success', 'La materia fue creada con éxito');
        }else{
            return redirect()->route('materias.index')->with('error', 'La materia no fue creada');
        }

    }

}
