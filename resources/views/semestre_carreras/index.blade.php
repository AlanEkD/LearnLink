<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Asignar Materias a Semestres</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.0.2/dist/tailwind.min.css">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-5">
        <h1 class="text-2xl font-bold mb-5">Asignar Materias a Semestres</h1>

        @if(session('success'))
            <div class="bg-green-500 text-white p-3 rounded mb-5">{{ session('success') }}</div>
        @endif

        @if($semestreCarreras && $semestreCarreras->isNotEmpty())
        @foreach($semestreCarreras as $semestreCarrera)
            <div class="bg-white shadow rounded p-3 mb-3">
                <h2 class="text-lg font-bold">{{ $semestreCarrera->carrera->nombre }} - Semestre {{ $semestreCarrera->semestre->id }}</h2>
                <ul class="mt-2">
                    @foreach([$semestreCarrera->materia1, $semestreCarrera->materia2, $semestreCarrera->materia3, $semestreCarrera->materia4, $semestreCarrera->materia5, $semestreCarrera->materia6, $semestreCarrera->materia7, $semestreCarrera->materia8, $semestreCarrera->materia9, $semestreCarrera->materia10] as $materia)
                        @if($materia)
                            <li>{{ $materia->nombre }}</li>
                        @endif
                    @endforeach
                </ul>
            </div>
        @endforeach
    @else
        <p>No hay semestre carreras disponibles.</p>
    @endif

        <form action="{{ route('semestres.asignar') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="carrera_id" class="block text-sm font-medium text-gray-700">Seleccionar Carrera</label>
                <select name="carrera_id" id="carrera_id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50">
                    @foreach($carreras as $carrera)
                        <option value="{{ $carrera->id }}">{{ $carrera->nombre }}</option>
                    @endforeach
                </select>
                @error('carrera_id')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="semestre_id" class="block text-sm font-medium text-gray-700">Seleccionar Semestre</label>
                <select name="semestre_id" id="semestre_id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50">
                    @foreach($semestres as $semestre)
                        <option value="{{ $semestre->id }}">{{ $semestre->id }}</option>
                    @endforeach
                </select>
                @error('semestre_id')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Seleccionar Materias (Máximo 10)</label>
                <select name="materias[]" multiple class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50">
                    @foreach($materias as $materia)
                        <option value="{{ $materia->id }}">{{ $materia->nombre }}</option>
                    @endforeach
                </select>
                @error('materias')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">Asignar Materias</button>
        </form>
    </div>
    <a href="/homepage" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-lg font-semibold text-white text-sm hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
        <!-- Icono de flecha de regreso -->
        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"></path>
        </svg>
        Regresar
    </a>
</body>
</html>
