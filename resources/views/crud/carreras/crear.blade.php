<!-- resources/views/crud/carreras/crear.blade.php -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Carrera</title>
</head>
<body>
    <h1>Crear Nueva Carrera</h1>

    <!-- Mostrar mensajes de validación -->
    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('carreras.store') }}" method="POST">
    @csrf
    <div class="mb-4">
        <label for="nombre" class="block text-gray-700">Nombre de la Carrera</label>
        <input type="text" name="nombre" id="nombre" required class="border border-gray-300 p-2 rounded w-full">
    </div>

    <div class="mb-4">
        <label for="facultad_id" class="block text-gray-700">Facultad</label>
        <select name="facultad_id" id="facultad_id" required class="border border-gray-300 p-2 rounded w-full">
            <option value="">Seleccione una facultad</option>
            @foreach($facultades as $facultad)
                <option value="{{ $facultad->id }}">{{ $facultad->nombre }}</option>
            @endforeach
        </select>
    </div>

    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Crear Carrera</button>
</form>


    <a href="{{ route('carreras.index') }}">Volver a la lista de Carreras</a>
</body>
</html>
