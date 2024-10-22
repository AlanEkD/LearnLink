<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Crear Tipo</title>
    @vite('resources/css/app.css') <!-- Ensure you're including your CSS -->
</head>
<body class="bg-gray-100">
    <main class="min-h-screen flex flex-col items-center p-5">
        <h1 class="text-4xl font-bold text-gray-800 mt-10">Crear Tipo</h1>

        @if(session('success'))
            <div class="mb-4 p-3 text-green-700 bg-green-200 rounded-lg shadow-md w-[300px]">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('tipos.store') }}" method="POST" class="bg-white shadow-lg rounded-lg p-8 w-full max-w-md mt-10">
            @csrf
            <div class="flex flex-col gap-5">
                <div class="form-group">
                    <label for="nombre" class="text-gray-700">Nombre del Tipo:</label>
                    <input type="text" name="nombre" id="nombre" class="bg-gray-100 border border-gray-300 px-3 py-2 w-full rounded-md focus:outline-none focus:border-fuchsia-500" required>
                </div>

                <button type="submit" class="text-lg bg-fuchsia-500 hover:bg-fuchsia-600 rounded-md px-6 py-2 text-white shadow-md mt-4 transition duration-300">
                    Crear Tipo
                </button>
            </div>
        </form>

        <div class="overflow-x-auto w-full max-w-4xl flex flex-col mt-10">
            <h2 class="text-2xl font-semibold text-gray-800">Tipos Existentes</h2>
            <table class="min-w-full bg-white shadow-lg rounded-lg overflow-hidden mt-5">
                <thead class="bg-gray-200 text-gray-600">
                    <tr>
                        <th class="py-3 px-4 text-left rounded-l-md">#</th>
                        <th class="py-3 px-4 text-left">Nombre</th>
                        <th class="py-3 px-4 text-left rounded-r-md">Acciones</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700">
                    @foreach($tipos as $i => $tipo)
                        <tr class="border-b hover:bg-gray-100">
                            <td class="py-3 px-4">{{ $i + 1 }}</td>
                            <td class="py-3 px-4">{{ $tipo->nombre }}</td>
                            <td class="py-3 px-4">
                                <form action="{{ route('tipos.destroy', $tipo->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:text-red-700 transition duration-300" onclick="return confirm('¿Estás seguro de que deseas eliminar este tipo?');">
                                        Eliminar
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </main>
</body>
</html>
