<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')

    <title>Lista de Carreras</title>
    <script>
        function toggleModal() {
            const modal = document.getElementById('modal');
            modal.classList.toggle('hidden');
        }
    </script>
</head>

<body class="bg-gray-100 py-8">

    <div class="container mx-auto">
        <h1 class="text-2xl font-semibold text-center mb-6">Lista de Carreras</h1>

        <!-- Mostrar mensaje de éxito si se creó una carrera -->
        @if (session('success'))
            <div class="mb-4 p-2 text-green-700 bg-green-100 rounded">
                {{ session('success') }}
            </div>
        @endif
        

        <!-- Tabla para mostrar las carreras -->
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white shadow rounded-lg">
                <thead>
                    <tr class="bg-gray-200 text-gray-600">
                        <th class="py-3 px-4 text-left">#</th>
                        <th class="py-3 px-4 text-left">Nombre</th>
                        <th class="py-3 px-4 text-left">Facultad</th>

                        <th class="py-3 px-4 text-left">Acciones</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700">
                    @foreach ($carreras as $i => $carrera)
                        <tr class="border-b hover:bg-gray-50">
                            <td class="py-3 px-4">{{ $i + 1 }}</td>
                            <td class="py-3 px-4">{{ $carrera->nombre }}</td>
                            <td>
                                {{$carrera->facultad->nombre}}
                            </td>
                            <td class="py-3 px-4">
                                <div class="flex space-x-4">
                                    <a href="{{ route('carreras.show', $carrera->id) }}" class="text-blue-600 hover:underline">Ver</a>
                                    <a href="{{ route('carreras.edit', $carrera->id) }}" class="text-yellow-600 hover:underline">Editar</a>
                                    <form action="{{ route('carreras.destroy', $carrera->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de eliminar esta carrera?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:underline">Eliminar</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="mt-6 text-center">
            <button onclick="toggleModal()" class="inline-block bg-blue-500 text-white font-semibold py-2 px-4 rounded hover:bg-blue-600">Crear Nueva Carrera</button>
        </div>
    </div>

    <!-- Modal -->
    <div id="modal" class="flex fixed inset-0  items-center justify-center bg-gray-500 bg-opacity-50 hidden">
        <div class="bg-white rounded-lg shadow-lg p-6 w-96">
            <h2 class="text-xl font-semibold mb-4">Crear Nueva Carrera</h2>
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

                <div class="flex justify-between">
                    <button type="button" onclick="toggleModal()" class="text-gray-500 hover:text-gray-700">Cancelar</button>
                </div>
                <button type="submit" class="bg-blue-500 text-white font-semibold py-2 px-4 rounded hover:bg-blue-600">Crear</button>
            </form>
        </div>
        
    </div>
    
</body>

</html>
