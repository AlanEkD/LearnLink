<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Asignar Materias a Carrera</title>
</head>
<body class="bg-gray-100">
    <main class="min-h-screen flex flex-col items-center p-5">
        <h1 class="text-4xl font-bold text-gray-800 mt-10">Asignar Materias a Carrera</h1>

        @if(session('success'))
            <div class="mb-4 p-3 text-green-700 bg-green-200 rounded-lg shadow-md w-[300px]">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('carrera_materia.store') }}" method="POST" class="bg-white shadow-lg rounded-lg p-8 w-full max-w-md mt-10">
            @csrf
            <div class="flex flex-col gap-5">
                <div class="form-group">
                    <label for="carrera_id" class="text-gray-700">Selecciona una Carrera:</label>
                    <select name="carrera_id" id="carrera_id" class="bg-gray-100 border border-gray-300 px-3 py-2 w-full rounded-md focus:outline-none focus:border-fuchsia-500" required>
                        @foreach($carreras as $carrera)
                            <option value="{{ $carrera->id }}">{{ $carrera->nombre }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="materia_id" class="text-gray-700">Selecciona una Materia:</label>
                    <select name="materia_id" id="materia_id" class="bg-gray-100 border border-gray-300 px-3 py-2 w-full rounded-md focus:outline-none focus:border-fuchsia-500" required>
                        @foreach($materias as $materia)
                            <option value="{{ $materia->id }}">{{ $materia->nombre }}</option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="text-lg bg-fuchsia-500 hover:bg-fuchsia-600 rounded-md px-6 py-2 text-white shadow-md mt-4 transition duration-300">
                    Asignar Materia
                </button>
            </div>
        </form>

        <div class="overflow-x-auto w-full max-w-4xl flex flex-col mt-10">
            <table class="min-w-full bg-white shadow-lg rounded-lg overflow-hidden">
                <thead class="bg-gray-200 text-gray-600">
                    <tr>
                        <th class="py-3 px-4 text-left rounded-l-md">#</th>
                        <th class="py-3 px-4 text-left">Carrera</th>
                        <th class="py-3 px-4 text-left">Materia</th>
                        <th class="py-3 px-4 text-left rounded-r-md">Acciones</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700">
                    @forelse($materias_carrera as $asignacion)
                        <tr class="border-b hover:bg-gray-100">
                            <td class="py-3 px-4">{{ $loop->iteration }}</td>
                            <td class="py-3 px-4">{{ $asignacion->carrera->nombre }}</td>
                            <td class="py-3 px-4">{{ $asignacion->materia->nombre }}</td>
                            <td class="py-3 px-4">
                                <div class="flex space-x-4">
                                    <form action="{{ route('carrera_materia.destroy', $asignacion->id) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500 hover:text-red-700 transition duration-300" onclick="return confirm('¿Estás seguro de que deseas eliminar esta asignación?');">
                                            Eliminar
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="py-3 px-4 text-center">No hay asignaciones registradas.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </main>
</body>
</html>
