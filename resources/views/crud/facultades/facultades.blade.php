<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Facultades</title>
</head>
<body class="bg-gray-100">
    <main class="min-h-screen flex flex-col items-center p-5">
        <h1 class="text-4xl font-bold text-gray-800 mt-10">Facultades</h1>
        <!-- Modal para crear facultades -->
            <div class="modal-create hidden fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-10">
                <div class="bg-white rounded-lg shadow-lg p-8 w-[350px]">
                    <form action="{{ route('facultades.store') }}" method="POST" enctype="multipart/form-data" class="flex flex-col gap-5">
                        @csrf
                        <button type="button" class="close absolute top-3 right-3 text-gray-500 hover:text-red-600">X</button>
                        <h2 class="text-2xl font-semibold mb-4 text-center">Crear Facultad</h2>
                        
                        <label for="nombre" class="text-gray-700">Nombre</label>
                        <input
                            class="bg-gray-100 border border-gray-300 px-3 py-2 w-full rounded-md focus:outline-none focus:border-fuchsia-500"
                            type="text" id="nombre" name="nombre" placeholder="Ingresa el nombre de la facultad" required>
                        
                        <!-- Campo para subir la foto -->
                        <label for="foto" class="text-gray-700">Foto (PNG)</label>
                        <input
                            class="bg-gray-100 border border-gray-300 px-3 py-2 w-full rounded-md focus:outline-none focus:border-fuchsia-500"
                            type="file" id="foto" name="foto" accept="image/png">
                        
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
                            <th class="py-3 px-4 text-left">Logo</th>
                            <th class="py-3 px-4 text-left rounded-r-md">Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-700">
                        @foreach($facultades as $i => $facultad)
                            <tr class="border-b hover:bg-gray-100">
                                <td class="py-3 px-4">{{ $i + 1 }}</td>
                                <td class="py-3 px-4">{{ $facultad->nombre }}</td>
                                <td class="py-3 px-4">
                                    @if($facultad->foto)
                                        <img src="{{ asset('images/facultades/' . $facultad->foto) }}" alt="Logo de {{ $facultad->nombre }}" class="w-16 h-16 object-cover rounded-md">
                                    @else
                                        <span>No hay logo</span>
                                    @endif
                                </td>
                                <td class="py-3 px-4">
                                    
                                    <div class="flex space-x-4">
                                        <button class="edit text-blue-500 hover:text-blue-700 transition duration-300" data-id="{{ $facultad->id }}" data-nombre="{{ $facultad->nombre }}">
                                            Editar
                                        </button>
                                        <button class="delete text-red-500 hover:text-red-700 transition duration-300" data-id="{{ $facultad->id }}" data-nombre="{{ $facultad->nombre }}">
                                            Eliminar
                                        </button>
                                    </div>
                                </td>
                            </tr>

                            
                            <!-- Modal para editar facultades -->
                            <div class="modal-edit-{{ $facultad->id }} hidden fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-10">
                                <div class="bg-white rounded-lg shadow-lg p-8 w-[350px]">
                                     <form action="{{ route('facultades.update', $facultad->id) }}" method="POST" enctype="multipart/form-data" class="flex flex-col gap-5">
                                           @csrf
                                             @method('PUT')
                                        <button type="button" class="close-modal-edit absolute top-3 right-3 text-gray-500 hover:text-red-600">X</button>
                                             <h2 class="text-2xl font-semibold mb-4 text-center">Editar Facultad</h2>
                
                                                 <label for="nombre" class="text-gray-700">Nombre</label>
                                                         <input
                                                               class="bg-gray-100 border border-gray-300 px-3 py-2 w-full rounded-md focus:outline-none focus:border-fuchsia-500"
                                                                  type="text" id="nombre" name="nombre" value="{{ $facultad->nombre }}" required>
                
                <!-- Campo para subir la foto -->
                                                <label for="foto" class="text-gray-700">Foto (PNG)</label>
                                                    <input
                                                        class="bg-gray-100 border border-gray-300 px-3 py-2 w-full rounded-md focus:outline-none focus:border-fuchsia-500"
                                                            type="file" id="foto" name="foto" accept="image/png">
                                        
                                                <button type="submit" class="text-lg bg-fuchsia-500 hover:bg-fuchsia-600 rounded-md px-6 py-2 text-white shadow-md mt-4 transition duration-300">
                                            Actualizar
                                            </button>
                                                </form>
                                        </div>
                            </div>


                            <!-- Modal para eliminar facultades -->
                            <div class="modal-delete-{{ $facultad->id }} hidden fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-10">
                                <div class="bg-white rounded-lg shadow-lg p-8 w-[350px]">
                                    <h2 class="text-xl font-semibold mb-4 text-center text-gray-800">¿Estás seguro de eliminar la facultad?</h2>
                                    <p class="text-gray-600 mb-6 text-center">
                                        Una vez eliminada no se podrá recuperar y los datos relacionados a ella se eliminarán.
                                    </p>
                                    <form action="{{ route('facultades.destroy', $facultad->id) }}" method="POST" class="flex flex-col gap-4">
                                        @csrf
                                        @method('DELETE')

                                        <div class="flex justify-between">
                                            <button type="button" class="close-modal-delete rounded-md p-2 text-gray-700 hover:text-gray-900 border border-gray-300 hover:bg-gray-100 transition duration-200">
                                                Cancelar
                                            </button>
                                            <button type="submit" class="text-lg bg-red-500 hover:bg-red-600 rounded-md px-4 py-2 text-white shadow-md transition duration-200">
                                                Eliminar
                                            </button>
                                        </div>
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
            // Seleccionar el botón y el modal para crear
            const openButton = document.querySelector('.open');
            const modalCreate = document.querySelector('.modal-create');
            const closeModalCreate = document.querySelector('.close');

            // Función para abrir el modal de creación
            openButton.addEventListener('click', function() {
                modalCreate.classList.remove('hidden');
            });

            // Función para cerrar el modal de creación
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
                    const modalEdit = this.closest('.modal-edit'); // Encuentra el modal más cercano
                    modalEdit.classList.add('hidden'); // Cierra el modal
                });
            });

            // Función para cerrar el modal de eliminación
            document.querySelectorAll('.close-modal-delete').forEach(button => {
                button.addEventListener('click', function() {
                    const modalDelete = this.closest('.modal-delete'); // Encuentra el modal más cercano
                    modalDelete.classList.add('hidden'); // Cierra el modal
                });
            });

            const successMessage = document.getElementById('success-message');
    if (successMessage) {
        // Oculta el mensaje después de 6 segundos (6000 ms)
        setTimeout(() => {
            successMessage.classList.add('hidden');
        }, 6000);
    }
        </script>
    </main>
</body>
</html>
