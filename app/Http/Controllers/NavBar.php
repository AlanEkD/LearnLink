<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Carreras;
use App\Models\Facultades;

class NavBar extends Controller
{
    public function getCarrerasByFacultad(Request $request)
    {
        $facultadId= $request->input('id');
        $facultad = Facultades::find($facultadId); // Obtener la facultad
        $carreras = Carreras::where('facultad_id', $facultadId)->get();

        return response()->json([
            'carreras' => $carreras,
            'facultad' => $facultad
        ]); // Devolver datos en JSON

    }
}
