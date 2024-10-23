<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Home</title>
    @vite('resources/css/app.css')
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>
<body class="bg-gray-200 text-gray-800 bg-no-repeat bg-center bg-contain font-roboto" >

    <header class="bg-gray-800 bg-opacity-90 shadow-lg">
        <div class="container mx-auto py-6 px-4">
            <h1 class="text-3xl font-bold text-white">Admin Dashboard</h1>
        </div>
    </header>

    <main class="flex justify-center items-center h-screen" >
        <div class="bg-gray-800 bg-opacity-90 p-8 rounded-lg shadow-lg bg-no-repeat bg-center bg-contain font-roboto" style="background-image: url('/img/LOGO.png'); background-size: 50%; background-position: center;">
            <h2 class="text-2xl font-semibold text-white mb-4 text-center">Welcome, Admin!</h2>
            <p class="text-gray-400 mb-6 text-center">This is the admin home page.</p>
           
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <a href="/materiales" class="bg-indigo-500 text-white py-8 px-4 rounded-lg text-center shadow-lg hover:bg-indigo-600 transform hover:-translate-y-1 transition">
                    <i class="fas fa-folder-open mr-2"></i> Ver Material que Tenemos
                </a>

                <a href="/material" class="bg-blue-500 text-white py-8 px-4 rounded-lg text-center shadow-lg hover:bg-blue-600 transform hover:-translate-y-1 transition">
                    <i class="fas fa-edit mr-2"></i> Editar Material
                </a>

                <a href="/facultades" class="bg-green-500 text-white py-8 px-4 rounded-lg text-center shadow-lg hover:bg-green-600 transform hover:-translate-y-1 transition">
                    <i class="fas fa-university mr-2"></i> Editar Facultades
                </a>

                <a href="/carreras" class="bg-yellow-500 text-white py-8 px-4 rounded-lg text-center shadow-lg hover:bg-yellow-600 transform hover:-translate-y-1 transition">
                    <i class="fas fa-graduation-cap mr-2"></i> Editar Carreras
                </a>

                <a href="/materias" class="bg-purple-500 text-white py-8 px-4 rounded-lg text-center shadow-lg hover:bg-purple-600 transform hover:-translate-y-1 transition">
                    <i class="fas fa-book mr-2"></i> Editar Materias
                </a>

                <a href="/tipos" class="bg-red-500 text-white py-8 px-4 rounded-lg text-center shadow-lg hover:bg-red-600 transform hover:-translate-y-1 transition">
                    <i class="fas fa-tags mr-2"></i> Editar Tipo
                </a>

                <a href="/tipo_materias" class="bg-pink-500 text-white py-8 px-4 rounded-lg text-center shadow-lg hover:bg-pink-600 transform hover:-translate-y-1 transition">
                    <i class="fas fa-cubes mr-2"></i> Editar Tipo de Materias
                </a>
            </div>
        </div>
    </main>

    <footer class="bg-gray-900 text-white py-6 mt-10">
        <div class="container mx-auto text-center">
            <p class="text-sm text-gray-400">&copy; {{ date('Y') }} LearnLink. All rights reserved.</p>
        </div>
    </footer>

    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
