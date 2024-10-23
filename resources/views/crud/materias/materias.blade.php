<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Materias</title>
</head>
<body class="bg-gray-100">
    <main class="min-h-screen flex flex-col items-center p-5">
        <h1 class="text-4xl font-bold text-gray-800 mt-10">Materias</h1>

        <!-- Modal para crear materias -->
        <div class="modal-create hidden fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-10">
            <div class="bg-white rounded-lg shadow-lg p-8 w-[350px]">
                <form action="{{ route('materias.store') }}" method="POST" class="flex flex-col gap-5">
                    @csrf
                    <button type="button" class="close absolute top-3 right-3 text-gray-500 hover:text-red-600">X</button>
                    <h2 class="text-2xl font-semibold mb-4 text-center">Crear Materia</h2>
                    <label for="nombre" class="text-gray-700">Nombre</label>
                    <input
                        class="bg-gray-100 border border-gray-300 px-3 py-2 w-full rounded-md focus:outline-none focus:border-fuchsia-500"
                        type="text" id="nombre" name="nombre" placeholder="Ingresa el nombre de la materia" required>
                    <label for="carrera" class="text-gray-700">Carrera</label>
                    <select class="bg-gray-100 border border-gray-300 px-3 py-2 w-full rounded-md focus:outline-none focus:border-fuchsia-500" id="carrera" name="carrera" required>
                        @foreach($carreras as $carrera)
                            <option value="{{ $carrera->id }}">{{ $carrera->nombre }}</option>
                        @endforeach
                    </select>
                    <label for="creditos" class="text-gray-700">Créditos</label>
                    <input
                        class="bg-gray-100 border border-gray-300 px-3 py-2 w-full rounded-md focus:outline-none focus:border-fuchsia-500"
                        type="text" id="creditos" name="creditos" placeholder="Ingresa los créditos" required>
                    <label for="descripcion" class="text-gray-700">Descripción</label>
                    <textarea
                        class="bg-gray-100 border border-gray-300 px-3 py-2 w-full rounded-md focus:outline-none focus:border-fuchsia-500"
                        id="descripcion" name="descripcion" placeholder="Ingresa la descripción" required></textarea>
                        <select name="tipo_materia_id" id="tipo_materia_id" required class="bg-gray-100 border border-gray-300 px-3 py-2 w-full rounded-md focus:outline-none focus:border-fuchsia-500">
                            @foreach($tiposMaterias as $tipo)
                                <option value="{{ $tipo->id }}">{{ $tipo->nombre }}</option>
                            @endforeach
                        </select>
                        <button type="submit" class="text-lg bg-fuchsia-500 hover:bg-fuchsia-600 rounded-md px-6 py-2 text-white shadow-md mt-4 transition duration-300">
                        Crear
                    </button>
                </form>
            </div>
        </div>

        <div class="h-fit w-full flex flex-col items-center mt-10">
            <button class="open text-lg bg-fuchsia-500 rounded-md px-6 py-2 text-white shadow-md mb-4 transition duration-300">
                Crear
            </button>
            <div class="overflow-x-auto w-full max-w-4xl flex flex-col">
                @if (session('success'))
                    <div id="success-message" class="  mb-4 left-[500px] p-3 text-green-700 bg-green-200 rounded-lg shadow-md w-[300px]">
                        {{ session('success') }}
                    </div>
                @endif

                <table class="min-w-full bg-white shadow-lg rounded-lg overflow-hidden">
                    <thead class="bg-gray-200 text-gray-600">
                        <tr>
                            <th class="py-3 px-4 text-left rounded-l-md">#</th>
                            <th class="py-3 px-4 text-left">Nombre</th>
                            <th class="py-3 px-4 text-left">Créditos</th>
                            <th class="py-3 px-4 text-left">Descripción</th>
                            <th class="py-3 px-4 text-left rounded-r-md">Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-700">
                        @foreach($materias as $i => $materia)
                            <tr class="border-b hover:bg-gray-100">
                                <td class="py-3 px-4">{{ $i + 1 }}</td>
                                <td class="py-3 px-4">{{ $materia->nombre }}</td>
                                <td class="py-3 px-4">{{ $materia->creditos }}</td>
                                <td class="py-3 px-4">{{ $materia->descripcion }}</td>
                                <td class="py-3 px-4">
                                    <div class="flex space-x-4">
                                        <button class="edit text-blue-500 hover:text-blue-700 transition duration-300" data-id="{{ $materia->id }}" data-nombre="{{ $materia->nombre }}" data-carrera="{{ $materia->carrera_id }}" data-creditos="{{ $materia->creditos }}" data-descripcion="{{ $materia->descripcion }}">
                                            Editar
                                        </button>
                                        <button class="delete text-red-500 hover:text-red-700 transition duration-300" data-id="{{ $materia->id }}" data-nombre="{{ $materia->nombre }}">
                                            Eliminar
                                        </button>
                                    </div>
                                </td>
                            </tr>

                            <!-- Modal para editar materias -->
                            <div class="modal-edit-{{ $materia->id }} hidden fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-10">
                                <div class="bg-white rounded-lg shadow-lg p-8 w-[350px]">
                                    <form action="{{ route('materias.update', $materia->id) }}" method="POST" class="flex flex-col gap-5">
                                        @csrf
                                        @method('PUT')
                                        <button type="button" class="close-modal-edit absolute top-3 right-3 text-gray-500 hover:text-red-600">X</button>
                                        <h2 class="text-2xl font-semibold mb-4 text-center">Editar Materia</h2>
                                        <label for="nombre" class="text-gray-700">Nombre</label>
                                        <input
                                            class="bg-gray-100 border border-gray-300 px-3 py-2 w-full rounded-md focus:outline-none focus:border-fuchsia-500"
                                            type="text" id="nombre" name="nombre" value="{{ $materia->nombre }}" required>
                                        <label for="carrera" class="text-gray-700">Carrera</label>
                                        <select class="bg-gray-100 border border-gray-300 px-3 py-2 w-full rounded-md focus:outline-none focus:border-fuchsia-500" id="carrera" name="carrera" required>
                                            @foreach($carreras as $carrera)
                                                <option value="{{ $carrera->id }}"> {{ $carrera->nombre }}</option>
                                            @endforeach
                                        </select>
                                        <label for="creditos" class="text-gray-700">Créditos</label>
                                        <input
                                            class="bg-gray-100 border border-gray-300 px-3 py-2 w-full rounded-md focus:outline-none focus:border-fuchsia-500"
                                            type="text" id="creditos" name="creditos" value="{{ $materia->creditos }}" required>
                                        <label for="descripcion" class="text-gray-700">Descripción</label>
                                        <textarea
                                            class="bg-gray-100 border border-gray-300 px-3 py-2 w-full rounded-md focus:outline-none focus:border-fuchsia-500"
                                            id="descripcion" name="descripcion" required>{{ $materia->descripcion }}</textarea>
                                        <button type="submit" class="text-lg bg-fuchsia-500 hover:bg-fuchsia-600 rounded-md px-6 py-2 text-white shadow-md mt-4 transition duration-300">
                                            Actualizar
                                        </button>
                                    </form>
                                </div>
                            </div>

                        
                            
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
        <script>
            // Función para abrir el modal de creación
            const openButton = document.querySelector('.open');
            const modalCreate = document.querySelector('.modal-create');
            const closeModalCreate = document.querySelector('.close');

            openButton.addEventListener('click', function() {
                modalCreate.classList.remove('hidden');
            });

            closeModalCreate.addEventListener('click', () => {
                modalCreate.classList.add('hidden');
            });

            // Función para abrir el modal de edición
            document.querySelectorAll('.edit').forEach(button => {
                button.addEventListener('click', function() {
                    const id = this.getAttribute('data-id');
                    const modalEdit = document.querySelector(`.modal-edit-${id}`);
                    modalEdit.classList.remove('hidden');
                });
            });

            // Función para abrir el modal de eliminación
            document.querySelectorAll('.delete').forEach(button => {
                button.addEventListener('click', function() {
                    const id = this.getAttribute('data-id');
                    const modalDelete = document.querySelector(`.modal-delete-${id}`);
                    modalDelete.classList.remove('hidden');
                });
            });

            // Función para cerrar el modal de edición
            document.querySelectorAll('.close-modal-edit').forEach(button => {
                button.addEventListener('click', function() {
                    const modalEdit = this.closest('.modal-edit');
                    modalEdit.classList.add('hidden');
                });
            });

            // Función para cerrar el modal de eliminación
            document.querySelectorAll('.close-modal-delete').forEach(button => {
                button.addEventListener('click', function() {
                    const modalDelete = this.closest('.modal-delete');
                    modalDelete.classList.add('hidden');
                });
            });

            const successMessage = document.getElementById('success-message');
            if (successMessage) {
                setTimeout(() => {
                    successMessage.classList.add('hidden');
                }, 6000);
            }
        </script>
    </main>
</body>
</html>
