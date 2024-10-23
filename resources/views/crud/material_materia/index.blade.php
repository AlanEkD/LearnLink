<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @vite('resources/css/app.css') <!-- Ensure you're including your CSS -->

    <title>Crear Material Materia</title>
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-5">
        <h1 class="text-4xl font-bold mb-5">Materiales Materias</h1>

        @if(session('success'))
            <div id="success-message" class="mb-4 p-3 text-green-700 bg-green-200 rounded-lg shadow-md">
                {{ session('success') }}
            </div>
        @endif

        <!-- Botón para abrir el modal de creación -->
        <button class="open-modal-create text-lg bg-fuchsia-500 rounded-md px-6 py-2 text-white shadow-md mb-4 transition duration-300">
            Crear Material
        </button>

        <!-- Modal para crear material -->
        <div class="modal-create hidden fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-10">
            <div class="bg-white rounded-lg shadow-lg p-8 w-[350px]">
                <form action="{{ route('material.store') }}" method="POST" enctype="multipart/form-data" class="flex flex-col gap-5">
                    @csrf
                    <button type="button" class="close-modal-create absolute top-3 right-3 text-gray-500 hover:text-red-600">X</button>
                    <h2 class="text-2xl font-semibold mb-4 text-center">Crear Material</h2>
                    <label for="descripcion" class="text-gray-700">Descripción:</label>
                    <input type="text" name="descripcion" id="descripcion" class="bg-gray-100 border border-gray-300 px-3 py-2 w-full rounded-md" required placeholder="Descripción del material">
                    @if ($errors->has('descripcion'))
    <span class="text-red-500 text-sm">{{ $errors->first('descripcion') }}</span>
@endif
                    <label for="archivo" class="text-gray-700">Archivo (Video/PDF):</label>
                    <input type="file" name="archivo" id="archivo" class="bg-gray-100 border border-gray-300 px-3 py-2 w-full rounded-md" accept=".pdf, .mp4, .avi, .mpg, .webm" required>
                    @if ($errors->has('archivo'))
    <span class="text-red-500 text-sm">{{ $errors->first('archivo') }}</span>
@endif
                    <label for="materia_id" class="text-gray-700">Materia:</label>
                    <select name="materia_id" id="materia_id" class="bg-gray-100 border border-gray-300 px-3 py-2 w-full rounded-md" required>
                        <option value="">Selecciona una materia</option>
                        @foreach($materias as $materia)
                            <option value="{{ $materia->id }}">{{ $materia->nombre }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('materia_id'))
    <span class="text-red-500 text-sm">{{ $errors->first('materia_id') }}</span>
@endif

                    <label for="tipo_id" class="text-gray-700">Tipo:</label>
                    <select name="tipo_id" id="tipo_id" class="bg-gray-100 border border-gray-300 px-3 py-2 w-full rounded-md" required>
                        <option value="">Selecciona un tipo</option>
                        @foreach($tipos as $tipo)
                            <option value="{{ $tipo->id }}">{{ $tipo->nombre }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('tipo_id'))

    <span class="text-red-500 text-sm">{{ $errors->first('tipo_id') }}</span>
@endif

                    <button type="submit" class="text-lg bg-fuchsia-500 hover:bg-fuchsia-600 rounded-md px-6 py-2 text-white shadow-md mt-4 transition duration-300">
                        Crear Material
                    </button>
                </form>
            </div>
        </div>

        <div class="overflow-x-auto w-full max-w-4xl flex flex-col mt-10">
            <!-- Tabla para mostrar los materiales (ejemplo) -->
            <table class="min-w-full bg-white shadow-lg rounded-lg overflow-hidden">
                <thead class="bg-gray-200 text-gray-600">
                    <tr>
                        <th class="py-3 px-4 text-left rounded-l-md">#</th>
                        <th class="py-3 px-4 text-left">Descripción</th>
                        <th class="py-3 px-4 text-left">Materia</th>
                        <th class="py-3 px-4 text-left">Tipo</th>
                        <th class="py-3 px-4 text-left">Archivo</th>
                        <th class="py-3 px-4 text-left rounded-r-md">Acciones</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700">
                    @foreach($materiales as $i => $material)
                        <tr class="border-b hover:bg-gray-100">
                            <td class="py-3 px-4">{{ $i + 1 }}</td>
                            <td class="py-3 px-4">{{ $material->descripcion }}</td>
                            <td class="py-3 px-4">{{ $material->materia->nombre }}</td>
                            <td class="py-3 px-4">{{ $material->tipo->nombre }}</td>
                            <td class="py-3 px-4">
                                <td class="py-3 px-4">
                                    @if($material->tipo->nombre === 'Video')
                                    <video src="{{ route('video.show', ['filename' => basename($material->archivo)]) }}" controls class="w-24"></video>
                                    @elseif($material->tipo->nombre === 'PDF')
                                    <a href="{{ route('pdf.show', ['filename' => basename($material->archivo)]) }}" target="_blank" class="text-blue-500 hover:text-blue-700 transition duration-300">Ver PDF</a>
                                    @else
                                        <a href="{{ asset('storage/' . $material->archivo) }}" target="_blank" class="text-blue-500 hover:text-blue-700 transition duration-300">Ver Archivo</a>
                                    @endif
                                </td>
                                
                            
                            <td class="py-3 px-4">
                                <div class="flex space-x-4">
                                    <button class="edit text-blue-500 hover:text-blue-700 transition duration-300" data-id="{{ $material->id }}">Editar</button>
                                    <button class="delete text-red-500 hover:text-red-700 transition duration-300" data-id="{{ $material->id }}">Eliminar</button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <a href="/homepage" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-lg font-semibold text-white text-sm hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
        <!-- Icono de flecha de regreso -->
        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"></path>
        </svg>
        Regresar
    </a>
    <script src="{{ asset('js/app.js') }}"></script>
    <script>
        // Seleccionar el botón y el modal para crear
        const openModalButton = document.querySelector('.open-modal-create');
        const modalCreate = document.querySelector('.modal-create');
        const closeModalCreate = document.querySelector('.close-modal-create');

        // Función para abrir el modal de creación
        openModalButton.addEventListener('click', function() {
            modalCreate.classList.remove('hidden');
        });

        // Función para cerrar el modal de creación
        closeModalCreate.addEventListener('click', () => {
            modalCreate.classList.add('hidden');
        });

        const successMessage = document.getElementById('success-message');
        if (successMessage) {
            // Oculta el mensaje después de 6 segundos (6000 ms)
            setTimeout(() => {
                successMessage.classList.add('hidden');
            }, 6000);
        }
    </script>
</body>
</html>
