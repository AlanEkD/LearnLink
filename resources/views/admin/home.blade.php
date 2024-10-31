<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Home - Actualización de Base de Datos</title>
    @vite('resources/css/app.css')
    <link rel="icon" href="{{ asset('img/LOGO.png') }}" >
    
</head>
<body class="bg-gray-100 text-gray-800 font-roboto">

    <!-- Header -->
    <header class="bg-gradient-to-br from-indigo-500 to-purple-600 shadow-lg">
        <div class="container mx-auto py-6 px-4 flex justify-between items-center">
            <!-- Logo -->
            <a href="/">
                <img
                    class="h-20 w-20 transform hover:scale-110 transition duration-500 ease-in-out"
                    src="{{ asset('img/LOGO.png') }}"
                    alt="Logo"
                >
            </a>
        
            <!-- Titulo -->
            <h1 class="text-4xl font-extrabold text-white text-center tracking-widest flex-grow">
                Panel de Actualización
            </h1>
        
            <!-- Profile Button -->
            <a href="{{ route('dashboard') }}" class="bg-gradient-to-r from-purple-600 to-indigo-500 hover:from-indigo-600 hover:to-purple-600 text-white px-6 py-3 rounded-full shadow-2xl transition transform hover:scale-105 hover:shadow-lg duration-300 ease-in-out">
                Mi perfil
            </a>
        </div>
    </header>

    <div class="absolute inset-0 bg-center bg-no-repeat bg-contain opacity-10" style="background-image: url('{{ asset('img/LOGO.png') }}');">
    </div>
    <!-- Main Content -->
    <main class="flex justify-center items-center h-screen">
        <div class="bg-white p-10 rounded-lg shadow-2xl w-full max-w-6xl">
            <h2 class="text-3xl font-semibold text-gray-800 mb-6 text-center">Bienvenido, Profesor</h2>
            <p class="text-lg text-gray-600 mb-10 text-center">Utilice las siguientes opciones para actualizar los datos del sistema. Por favor, asegúrese de que la información es correcta antes de guardarla.</p>
           
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Botones de acción -->
                <a href="/materiales" class="bg-gradient-to-br from-indigo-500 to-purple-500 text-white py-10 px-6 rounded-lg text-center shadow-xl hover:from-indigo-600 hover:to-purple-600 transform hover:-translate-y-2 transition">
                    <i class="fas fa-folder-open mr-2"></i> Ver Materiales Disponibles
                </a>

                <a href="/material" class="bg-gradient-to-br from-indigo-500 to-purple-500 text-white py-10 px-6 rounded-lg text-center shadow-xl hover:from-indigo-600 hover:to-purple-600 transform hover:-translate-y-2 transition">
                    <i class="fas fa-edit mr-2"></i> Editar Material
                </a>

                <a href="/facultades" class="bg-gradient-to-br from-indigo-500 to-purple-500 text-white py-10 px-6 rounded-lg text-center shadow-xl hover:from-indigo-600 hover:to-purple-600 transform hover:-translate-y-2 transition">
                    <i class="fas fa-university mr-2"></i> Editar Facultades
                </a>

                <a href="/carreras" class="bg-gradient-to-br from-indigo-500 to-purple-500 text-white py-10 px-6 rounded-lg text-center shadow-xl hover:from-indigo-600 hover:to-purple-600 transform hover:-translate-y-2 transition">
                    <i class="fas fa-graduation-cap mr-2"></i> Editar Carreras
                </a>

                <a href="/materias" class="bg-gradient-to-br from-indigo-500 to-purple-500 text-white py-10 px-6 rounded-lg text-center shadow-xl hover:from-indigo-600 hover:to-purple-600 transform hover:-translate-y-2 transition">
                    <i class="fas fa-book mr-2"></i> Editar Materias
                </a>

                <a href="/tipos" class="bg-gradient-to-br from-indigo-500 to-purple-500 text-white py-10 px-6 rounded-lg text-center shadow-xl hover:from-indigo-600 hover:to-purple-600 transform hover:-translate-y-2 transition">
                    <i class="fas fa-tags mr-2"></i> Editar Tipos de Material
                </a>

                <a href="/tipo_materias" class="bg-gradient-to-br from-indigo-500 to-purple-500 text-white py-10 px-6 rounded-lg text-center shadow-xl hover:from-indigo-600 hover:to-purple-600 transform hover:-translate-y-2 transition">
                    <i class="fas fa-cubes mr-2"></i> Editar Tipos de Materias
                </a>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white py-6 mt-10">
        <div class="container mx-auto text-center">
            <p class="text-sm text-gray-400">&copy; {{ date('Y') }} LearnLink. Todos los derechos reservados.</p>
        </div>
    </footer>

    
</body>
</html>
