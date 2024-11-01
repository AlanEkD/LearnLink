<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Ingeniería Mecatrónica</title>
        <link rel="icon" href="{{ asset('img/LOGO.png') }}" >
        @vite('resources/css/app.css')
        <script src="https://cdn.tailwindcss.com"></script>
    </head>
    
<body class="font-sans bg-gray-100 text-gray-800 text-center overflow-x-hidden">

    <!-- Header -->
<header class="w-full py-4 px-8 bg-white shadow-md flex justify-between items-center" id="header">
    <!-- Logo -->
    <div class="flex items-center space-x-4">
        <a href="/" class="flex items-center space-x-2">
            <!-- Logo -->
            <img class="h-12 w-12 rounded-full shadow-lg bg-gradient-to-br from-green-500 to-purple-500" src="{{ asset('img/LOGO.png') }}" alt="Logo">
            <!-- Text -->
            <span class="text-2xl font-semibold text-indigo-700">LearnLink</span>
        </a>
    </div>

    <!-- Search Bar -->
    <div id="initialSearch" class="flex justify-center w-1/2">
        <input type="text" placeholder="Buscar materias, libros o documentos" class="py-2 px-4 rounded-full shadow-md w-full focus:ring-4 focus:ring-indigo-300 text-gray-800 placeholder-gray-400 outline-none">
    </div>

    <!-- Navigation Links -->
    <nav class="flex items-center space-x-8 text-indigo-700">
        <!-- Home Button -->
        <a href="/" class="text-indigo-700 hover:text-indigo-900 font-medium transition duration-300">
            Home
        </a>
        <!-- Authentication Button -->
        @auth
            <a href="{{ route('dashboard') }}" class="bg-gradient-to-br from-indigo-500 to-purple-500 text-white px-4 py-2 rounded-full shadow-lg hover:shadow-md transition duration-300">
                Mi perfil
            </a>
        @else
            <a href="{{ route('login') }}" class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-full shadow-lg hover:shadow-md transition duration-300">
                Iniciar sesión
            </a>
        @endauth
    </nav>
</header>


<div class="container mx-auto py-10 px-5 relative h-screen">
    
    <!-- Imagen de fondo como marca de agua -->
    <div class="absolute inset-0 bg-center bg-no-repeat bg-contain opacity-10" style="background-image: url('{{ asset('img/LOGO.png') }}');">
    </div>

    <!-- Contenedor de Semestres -->
    <div class="rounded-xl container mx-auto py-10 px-5 bg-gradient-to-r from-indigo-500 to-green-500 flex items-center justify-center">
        <!-- Grid para los semestres -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 ">
            <!-- Primer Semestre -->
            <div id="semestre-1" class="bg-white shadow-md rounded-lg p-6 semestre">
                <h3 class="text-xl font-semibold text-gray-700 mb-4">Primer Semestre</h3>
                <div class="space-y-2">
                    <button class="block w-full bg-gradient-to-r from-indigo-500 to-purple-500 text-white font-medium py-2 rounded-md shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-200" onclick="openTab('fisica1')">Fisica I y Lab.</button>
                    <button class="block w-full bg-gradient-to-r from-indigo-500 to-purple-500 text-white font-medium py-2 rounded-md shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-200" onclick="openTab('algebra')">Álgebra para Ingeniería</button>
                    <button class="block w-full bg-gradient-to-r from-indigo-500 to-purple-500 text-white font-medium py-2 rounded-md shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-200" onclick="openTab('mate1')">Matemáticas 1</button>
                    <button class="block w-full bg-gradient-to-r from-indigo-500 to-purple-500 text-white font-medium py-2 rounded-md shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-200" onclick="openTab('dibing')">Dibujo para Ingeniería</button>
                    <button class="block w-full bg-gradient-to-r from-indigo-500 to-purple-500 text-white font-medium py-2 rounded-md shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-200" onclick="openTab('quimicageneral')">Química General y Lab.</button>
                    <button class="block w-full bg-gradient-to-r from-indigo-500 to-purple-500 text-white font-medium py-2 rounded-md shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-200" onclick="openTab('ati')">Aplicación de las Tecnologías de Información</button>
                    <button class="block w-full bg-gradient-to-r from-indigo-500 to-purple-500 text-white font-medium py-2 rounded-md shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-200" onclick="openTab('comcom')">Competencia Comunicativa</button>

                </div>
            </div>

            <!-- Segundo Semestre -->
            <div id="semestre-2" class="bg-white shadow-md rounded-lg p-6 semestre">
                <h3 class="text-xl font-semibold text-gray-700 mb-4">Segundo Semestre</h3>
                <div class="space-y-2">
                    <button class="block w-full bg-gradient-to-r from-indigo-500 to-purple-500 text-white font-medium py-2 rounded-md shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-200" onclick="openTab('fisica2')">Fisica II y Lab.</button>
                    <button class="block w-full bg-gradient-to-r from-indigo-500 to-purple-500 text-white font-medium py-2 rounded-md shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-200" onclick="openTab('optativa1')">Optativa I</button>
                    <button class="block w-full bg-gradient-to-r from-indigo-500 to-purple-500 text-white font-medium py-2 rounded-md shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-200" onclick="openTab('mate2')">Matemáticas II</button>
                    <button class="block w-full bg-gradient-to-r from-indigo-500 to-purple-500 text-white font-medium py-2 rounded-md shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-200" onclick="openTab('cienciamat')">Ciencia de los Materiales</button>
                    <button class="block w-full bg-gradient-to-r from-indigo-500 to-purple-500 text-white font-medium py-2 rounded-md shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-200" onclick="openTab('prob')">Probabilidad y Estadística</button>
                    <button class="block w-full bg-gradient-to-r from-indigo-500 to-purple-500 text-white font-medium py-2 rounded-md shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-200" onclick="openTab('artes')">Apreciación de las Artes</button>
                </div>
            </div>

            <!-- Tercer Semestre -->
            <div id="semestre-3" class="bg-white shadow-md rounded-lg p-6 semestre">
                <h3 class="text-xl font-semibold text-gray-700 mb-4">Tercer Semestre</h3>
                <div class="space-y-2">
                    <button class="block w-full bg-gradient-to-r from-indigo-500 to-purple-500 text-white font-medium py-2 rounded-md shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-200" onclick="openTab('circuitos')">Circuitos Eléctricos y Lab.</button>
                    <button class="block w-full bg-gradient-to-r from-indigo-500 to-purple-500 text-white font-medium py-2 rounded-md shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-200" onclick="openTab('vectorial')">Mecánica Vectorial</button>
                    <button class="block w-full bg-gradient-to-r from-indigo-500 to-purple-500 text-white font-medium py-2 rounded-md shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-200" onclick="openTab('mate3')">Matemáticas III</button>
                    <button class="block w-full bg-gradient-to-r from-indigo-500 to-purple-500 text-white font-medium py-2 rounded-md shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-200" onclick="openTab('fisica4')">Física IV y Lab.</button>
                    <button class="block w-full bg-gradient-to-r from-indigo-500 to-purple-500 text-white font-medium py-2 rounded-md shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-200" onclick="openTab('intromec')">Introducción a la Mecatrónica</button>
                    <button class="block w-full bg-gradient-to-r from-indigo-500 to-purple-500 text-white font-medium py-2 rounded-md shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-200" onclick="openTab('alglin')">Álgebra Lineal</button>
                    <button class="block w-full bg-gradient-to-r from-indigo-500 to-purple-500 text-white font-medium py-2 rounded-md shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-200" onclick="openTab('ambiente')">Ambiente y Sostenibilidad</button>
                    <button class="block w-full bg-gradient-to-r from-indigo-500 to-purple-500 text-white font-medium py-2 rounded-md shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-200" onclick="openTab('dhsd')">Tópicos Selectos de Desarrollo Humano, Salud y Deportes</button>

                </div>
            </div>

            <!-- Cuarto Semestre -->
            <div id="semestre-4" class="bg-white shadow-md rounded-lg p-6 semestre">
                <h3 class="text-xl font-semibold text-gray-700 mb-4">Cuarto Semestre</h3>
                <div class="space-y-2">
                    <button class="block w-full bg-gradient-to-r from-indigo-500 to-purple-500 text-white font-medium py-2 rounded-md shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-200" onclick="openTab('elec1')">Electrónica I y Lab.</button>
                    <button class="block w-full bg-gradient-to-r from-indigo-500 to-purple-500 text-white font-medium py-2 rounded-md shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-200" onclick="openTab('maqelec')">Máquinas Eléctricas y Lab.</button>
                    <button class="block w-full bg-gradient-to-r from-indigo-500 to-purple-500 text-white font-medium py-2 rounded-md shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-200" onclick="openTab('mate4')">Matemáticas IV</button>
                    <button class="block w-full bg-gradient-to-r from-indigo-500 to-purple-500 text-white font-medium py-2 rounded-md shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-200" onclick="openTab('mecflu')">Mecánica de Fluidos y Lab.</button>
                    <button class="block w-full bg-gradient-to-r from-indigo-500 to-purple-500 text-white font-medium py-2 rounded-md shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-200" onclick="openTab('sensores')">Sensores y Actuadores y Lab.</button>
                    <button class="block w-full bg-gradient-to-r from-indigo-500 to-purple-500 text-white font-medium py-2 rounded-md shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-200" onclick="openTab('mecmat')">Mecánica de Materiales y Lab.</button>
                    <button class="block w-full bg-gradient-to-r from-indigo-500 to-purple-500 text-white font-medium py-2 rounded-md shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-200" onclick="openTab('tde')">Técnicas de Diseño Electrónico</button>

                </div>
            </div>

            <!-- Quinto Semestre -->
            <div id="semestre-5" class="bg-white shadow-md rounded-lg p-6 semestre">
                <h3 class="text-xl font-semibold text-gray-700 mb-4">Quinto Semestre</h3>
                <div class="space-y-2">
                    <button class="block w-full bg-gradient-to-r from-indigo-500 to-purple-500 text-white font-medium py-2 rounded-md shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-200" onclick="openTab('elec2')">Electrónica II y Lab.</button>
                    <button class="block w-full bg-gradient-to-r from-indigo-500 to-purple-500 text-white font-medium py-2 rounded-md shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-200" onclick="openTab('elecdig1')">Electrónica Digital I y Lab.</button>
                    <button class="block w-full bg-gradient-to-r from-indigo-500 to-purple-500 text-white font-medium py-2 rounded-md shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-200" onclick="openTab('ingeco')">Ingeniería de Control y Lab.</button>
                    <button class="block w-full bg-gradient-to-r from-indigo-500 to-purple-500 text-white font-medium py-2 rounded-md shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-200" onclick="openTab('potflu')">Potencia Fluida y Lab.</button>
                    <button class="block w-full bg-gradient-to-r from-indigo-500 to-purple-500 text-white font-medium py-2 rounded-md shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-200" onclick="openTab('optativa5')">Optativa V</button>
                    <button class="block w-full bg-gradient-to-r from-indigo-500 to-purple-500 text-white font-medium py-2 rounded-md shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-200" onclick="openTab('dismaq')">Diseño de Máquinas y Lab.</button>
                    <button class="block w-full bg-gradient-to-r from-indigo-500 to-purple-500 text-white font-medium py-2 rounded-md shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-200" onclick="openTab('dap')">Tópicos Selectos para el Desarrollo Académico y Profesional</button>

                </div>
            </div>

            <!-- Sexto Semestre -->
            <div id="semestre-6" class="bg-white shadow-md rounded-lg p-6 semestre">
                <h3 class="text-xl font-semibold text-gray-700 mb-4">Sexto Semestre</h3>
                <div class="space-y-2">
                    <button class="block w-full bg-gradient-to-r from-indigo-500 to-purple-500 text-white font-medium py-2 rounded-md shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-200" onclick="openTab('dsep')">Diseño de Sistemas Electrónicos de Potencia y Lab.</button>
                    <button class="block w-full bg-gradient-to-r from-indigo-500 to-purple-500 text-white font-medium py-2 rounded-md shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-200" onclick="openTab('micro')">Microcontroladores y Lab.</button>
                    <button class="block w-full bg-gradient-to-r from-indigo-500 to-purple-500 text-white font-medium py-2 rounded-md shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-200" onclick="openTab('controlm')">Control Moderno y Lab.</button>
                    <button class="block w-full bg-gradient-to-r from-indigo-500 to-purple-500 text-white font-medium py-2 rounded-md shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-200" onclick="openTab('ia_rn')">Inteligencia Artificial y Redes Neuronales</button>
                    <button class="block w-full bg-gradient-to-r from-indigo-500 to-purple-500 text-white font-medium py-2 rounded-md shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-200" onclick="openTab('cnc')">Máquinas de CNC y Lab.</button>
                    <button class="block w-full bg-gradient-to-r from-indigo-500 to-purple-500 text-white font-medium py-2 rounded-md shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-200" onclick="openTab('contexto')">Contexto Social de la Profesión</button>

                </div>
            </div>

            <!-- Séptimo Semestre -->
            <div id="semestre-7" class="bg-white shadow-md rounded-lg p-6 semestre">
                <h3 class="text-xl font-semibold text-gray-700 mb-4">Séptimo Semestre</h3>
                <div class="space-y-2">
                    <button class="block w-full bg-gradient-to-r from-indigo-500 to-purple-500 text-white font-medium py-2 rounded-md shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-200" onclick="openTab('modelado')">Modelado y Simulación de Sistemas Mecatrónicos</button>
                    <button class="block w-full bg-gradient-to-r from-indigo-500 to-purple-500 text-white font-medium py-2 rounded-md shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-200" onclick="openTab('interfaces')">Interfaces Gráficas</button>
                    <button class="block w-full bg-gradient-to-r from-indigo-500 to-purple-500 text-white font-medium py-2 rounded-md shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-200" onclick="openTab('arqrob')">Arquitectura de Robots y Lab.</button>
                    <button class="block w-full bg-gradient-to-r from-indigo-500 to-purple-500 text-white font-medium py-2 rounded-md shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-200" onclick="openTab('dmp')">Diseños de Mecanismos de Precisión y Lab.</button>
                    <button class="block w-full bg-gradient-to-r from-indigo-500 to-purple-500 text-white font-medium py-2 rounded-md shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-200" onclick="openTab('etica')">Ética, Sociedad y Profesión</button>
                    <button class="block w-full bg-gradient-to-r from-indigo-500 to-purple-500 text-white font-medium py-2 rounded-md shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-200" onclick="openTab('lce')">Tópicos Selectos de Lenguas y Culturas Extranjeras</button>
                    <button class="block w-full bg-gradient-to-r from-indigo-500 to-purple-500 text-white font-medium py-2 rounded-md shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-200" onclick="openTab('dsm')">Diseño de Sistemas Mecatrónicos y Lab.</button>

                </div>
            </div>

            <!-- Octavo Semestre -->
            <div id="semestre-8" class="bg-white shadow-md rounded-lg p-6 semestre">
                <h3 class="text-xl font-semibold text-gray-700 mb-4">Octavo Semestre</h3>
                <div class="space-y-2">
                    
                
                    <div class="relative  text-left">
                        <button class="block w-full bg-gradient-to-r from-indigo-500 to-purple-500 text-white font-medium py-2 px-4 rounded-md shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-200">Optativa I ACFP</button>
                        <div class="hidden absolute z-10 bg-white text-gray-700 rounded-md shadow-lg py-1">
                            <a href="#" onclick="openTab('ACPF1_1')" class="block px-4 py-2 text-sm hover:bg-gray-100">Adquisición de Datos y Lab.</a>
                            <a href="#" onclick="openTab('ACPF1_2')" class="block px-4 py-2 text-sm hover:bg-gray-100">Interfases I/O y Hombre-Máquina</a>
                        </div>
                    </div>
                    
                    <div class="relative  text-left">
                        <button class="block w-full bg-gradient-to-r from-indigo-500 to-purple-500 text-white font-medium py-2 px-4 rounded-md shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-200">Optativa II ACFP</button>
                        <div class="hidden absolute z-10 bg-white text-gray-700 rounded-md shadow-lg py-1">
                            <a href="#" onclick="openTab('ACPF2_1')" class="block px-4 py-2 text-sm hover:bg-gray-100">Diseño de Sistemas Embebidos</a>
                            <a href="#" onclick="openTab('ACPF2_2')" class="block px-4 py-2 text-sm hover:bg-gray-100">Servofluidos y Lab.</a>
                        </div>
                    </div>
                    
                    <div class="relative  text-left">
                        <button class="block w-full bg-gradient-to-r from-indigo-500 to-purple-500 text-white font-medium py-2 px-4 rounded-md shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-200">Optativa III ACFP</button>
                        <div class="hidden absolute z-10 bg-white text-gray-700 rounded-md shadow-lg py-1">
                            <a href="#" onclick="openTab('ACPF3_1')" class="block px-4 py-2 text-sm hover:bg-gray-100">Biomecánica y Lab.</a>
                            <a href="#" onclick="openTab('ACPF3_2')" class="block px-4 py-2 text-sm hover:bg-gray-100">Instrumentación Virtual y Lab.</a>
                            <a href="#" onclick="openTab('ACPF3_3')" class="block px-4 py-2 text-sm hover:bg-gray-100">Ingeniería Médica y Lab.</a>
                            <a href="#" onclick="openTab('ACPF3_4')" class="block px-4 py-2 text-sm hover:bg-gray-100">Fisiología y Anatomía para Ingenieros y Lab.</a>
                        </div>
                    </div>
                    
                    <div class="relative  text-left">
                        <button class="block w-full bg-gradient-to-r from-indigo-500 to-purple-500 text-white font-medium py-2 px-4 rounded-md shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-200">Optativa IV ACFP</button>
                        <div class="hidden absolute z-10 bg-white text-gray-700 rounded-md shadow-lg py-1">
                            <a href="#" onclick="openTab('ACPF4_1')" class="block px-4 py-2 text-sm hover:bg-gray-100">Servomecanismos y Lab.</a>
                            <a href="#" onclick="openTab('ACPF4_2')" class="block px-4 py-2 text-sm hover:bg-gray-100">Sistemas de Visión y Lab.</a>
                            <a href="#" onclick="openTab('ACPF4_3')" class="block px-4 py-2 text-sm hover:bg-gray-100">Crecimiento Biológico y Lab.</a>
                            <a href="#" onclick="openTab('ACPF4_4')" class="block px-4 py-2 text-sm hover:bg-gray-100">Reconocimiento de Patrones y Lab.</a>
                        </div>
                    </div>
                    
                    <div class="relative  text-left">
                        <button class="block w-full bg-gradient-to-r from-indigo-500 to-purple-500 text-white font-medium py-2 px-4 rounded-md shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-200">Optativa V ACFP</button>
                        <div class="hidden absolute z-10 bg-white text-gray-700 rounded-md shadow-lg py-1">
                            <a href="#" onclick="openTab('ACPF5_1')" class="block px-4 py-2 text-sm hover:bg-gray-100">CAD/CAM y Lab.</a>
                            <a href="#" onclick="openTab('ACPF5_2')" class="block px-4 py-2 text-sm hover:bg-gray-100">Mecatrónica Computacional y Lab.</a>
                            <a href="#" onclick="openTab('ACPF5_3')" class="block px-4 py-2 text-sm hover:bg-gray-100">Digitalizadores 3D y Lab.</a>
                            <a href="#" onclick="openTab('ACPF5_4')" class="block px-4 py-2 text-sm hover:bg-gray-100">Diseño Geométrico Biológico y Lab.</a>
                        </div>
                    </div>
                    
                    <div class="relative  text-left">
                        <button class="block w-full bg-gradient-to-r from-indigo-500 to-purple-500 text-white font-medium py-2 px-4 rounded-md shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-200">Optativa VI ACFP</button>
                        <div class="hidden absolute z-10 bg-white text-gray-700 rounded-md shadow-lg py-1">
                            <a href="#" onclick="openTab('ACPF6_1')" class="block px-4 py-2 text-sm hover:bg-gray-100">Percepción y Lab.</a>
                            <a href="#" onclick="openTab('ACPF6_2')" class="block px-4 py-2 text-sm hover:bg-gray-100">Prototipos Rápidos y Lab.</a>
                            <a href="#" onclick="openTab('ACPF6_3')" class="block px-4 py-2 text-sm hover:bg-gray-100">Prótesis y Lab.</a>
                            <a href="#" onclick="openTab('ACPF6_4')" class="block px-4 py-2 text-sm hover:bg-gray-100">Tópicos Selectos de BD I</a>
                        </div>
                    </div>
                    
                    <div class="relative  text-left">
                        <button class="block w-full bg-gradient-to-r from-indigo-500 to-purple-500 text-white font-medium py-2 px-4 rounded-md shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-200">Optativa VII ACFP</button>
                        <div class="hidden absolute z-10 bg-white text-gray-700 rounded-md shadow-lg py-1">
                            <a href="#" onclick="openTab('ACPF7_1')" class="block px-4 py-2 text-sm hover:bg-gray-100">Automatización y Lab.</a>
                            <a href="#" onclick="openTab('ACPF7_2')" class="block px-4 py-2 text-sm hover:bg-gray-100">Sistemas de Control Electrónico y Lab.</a>
                            <a href="#" onclick="openTab('ACPF7_3')" class="block px-4 py-2 text-sm hover:bg-gray-100">Dinámica de Cuerpos Vivos y Lab.</a>
                            <a href="#" onclick="openTab('ACPF7_4')" class="block px-4 py-2 text-sm hover:bg-gray-100">Mioelectricidad y Lab.</a>
                        </div>
                    </div>
                 </div>
            </div>
        </div>
    </div>

    <!-- Botón de Regreso al Inicio -->
    <button id="btn-top" onclick="scrollToTop()" class="fixed bottom-5 right-5 bg-gradient-to-r from-indigo-500 to-gray-900 text-white py-2 px-4 rounded-full shadow-lg hidden hover:bg-blue-700 transition">
        ⬆ Regresar al inicio
    </button>
    
<!-- Footer -->
<footer class="bg-gray-900 text-gray-400 py-6">
    <div class="container mx-auto">
        <div class="grid grid-cols-5 gap-8 text-sm">
            <!-- Primera columna -->
            <div>
                <h3 class="text-white mb-4">Escolar</h3>
                <ul class="space-y-2">
                    <li><a href="" class="hover:text-white transition duration-300"><i class="fas fa-envelope mr-2"></i> Teams Codigo 1 - v4adp7a</a></li>
                    <li><a href="" class="hover:text-white transition duration-300"><i class="fas fa-envelope mr-2"></i> Teams Codigo 2 - 1h94phz</a></li>
                    <li><a href="" class="hover:text-white transition duration-300"><i class="fas fa-envelope mr-2"></i> Teams Codigo 2 - zk7olu5</a></li>
                    <li><a href="" class="hover:text-white transition duration-300"><i class="fas fa-phone mr-2"></i>Numero de Telefono: 8113404423</a></li>
                </ul>
            </div>

            <!-- Segunda columna -->
            <div>
                <h3 class="text-white mb-4">Redes Sociales</h3>
                <ul class="space-y-2">
                    <li><a href="https://www.facebook.com/groups/134493809953990" target="_blank" class="hover:text-white transition duration-300"><i class="fab fa-facebook mr-2"></i> Facebook - FIME</a></li>
                    <li><a href="https://www.instagram.com/fime.oficial?igsh=MTE2OGNteDM0ZTcyOQ==" target="_blank" class="hover:text-white transition duration-300"><i class="fab fa-facebook mr-2"></i> Instagram - fime.oficial</a></li>
                </ul>
            </div>

            <!-- Tercera columna -->
            <div>
                <h3 class="text-white mb-4">Enlaces útiles</h3>
                <ul class="space-y-2">
                    <li><a href="https://www.universidad.com/contacto" target="_blank" class="hover:text-white transition duration-300"><i class="fas fa-globe mr-2"></i> Contacto en el sitio web</a></li>
                    <li><a href="https://www.fime.uanl.mx/aspirantes/" target="_blank" class="hover:text-white transition duration-300"><i class="fas fa-graduation-cap mr-2"></i> Admisiones</a></li>
                </ul>
            </div>

            <!-- Cuarta columna -->
            <div>
                <h3 class="text-white mb-4">Carreras</h3>
                <ul class="space-y-2">
                    <li><a href="#" class="hover:text-white transition duration-300">Ingeniería Mecatrónica</a></li>
                    <li><a href="#" class="hover:text-white transition duration-300">Ingeniería Biomédica</a></li>
                    <li><a href="#" class="hover:text-white transition duration-300">Ingeniería Aeronáutica</a></li>
                    <li><a href="#" class="hover:text-white transition duration-300">Ingeniería Biomédica</a></li>
                    <li><a href="#" class="hover:text-white transition duration-300">Ingeniería Mecánica y Eléctrica</a></li>
                    <li><a href="#" class="hover:text-white transition duration-300">Ingeniería en Software</a></li>
                </ul>
            </div>

            <!-- Quinta columna -->
            <div>
                <h3 class="text-white mb-4">Soporte</h3>
                <ul class="space-y-2">
                    <li><a href="" class="hover:text-white transition duration-300"><i class="fas fa-envelope mr-2">sadasda!</i> s</a></li>
                    <li><a href="" class="hover:text-white transition duration-300"><i class="fas fa-phone mr-2"></i> 5334</a></li>
                </ul>
            </div>
        </div>
    </div>
</footer>

<style>
    .hidden {
        display: none;
    }
</style>

<script>
    // Función para mostrar solo el semestre seleccionado
    function showSemester(semestreId) {
        // Oculta todos los semestres
        document.querySelectorAll('.semestre').forEach(semestre => {
            semestre.classList.add('hidden');
        });
        // Muestra el semestre seleccionado
        document.getElementById(semestreId).classList.remove('hidden');
    }

    // Añade un evento de clic a cada título de semestre
    document.querySelectorAll('.semestre h3').forEach(title => {
        title.addEventListener('click', () => {
            const semesterId = title.parentElement.id;
            showSemester(semesterId);
        });
    });
</script>
</body>

<script>
        document.querySelectorAll('.relative').forEach(dropdown => {
        dropdown.addEventListener('mouseenter', () => {
            dropdown.querySelector('div').classList.remove('hidden');
        });
        dropdown.addEventListener('mouseleave', () => {
            dropdown.querySelector('div').classList.add('hidden');
        });
    });
        // Función para el botón de scroll
        function scrollToTop() {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        }

        // Mostrar botón de regreso al inicio en scroll
        window.addEventListener('scroll', () => {
            const btn = document.getElementById('btn-top');
            btn.classList.toggle('hidden', window.scrollY < 300);
        });
</script>

</html>
