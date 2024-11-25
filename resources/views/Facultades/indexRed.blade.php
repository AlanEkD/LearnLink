<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Materias de {{ $carreras->nombre }}</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.0.2/dist/tailwind.min.css">
    <script>
        // Manejo de la visibilidad de los detalles
        function toggleDetails(id) {
            const details = document.getElementById(`details-${id}`);
            if (details) {
                details.classList.toggle('hidden');
                details.classList.toggle('fade-in');
            }
        }
    </script>
    <style>
        .fade-in {
            animation: fadeIn 0.5s ease-in-out;
        }
        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }
    </style>
</head>
<!-- Header -->
<header class="bg-gradient-to-br from-indigo-500 to-purple-600 shadow-lg">
    <div class="container mx-auto py-6 px-4 flex justify-between items-center">
        <!-- Logo -->
        <a href="/" class="z-20">
         
            <img
                class="h-20 w-20 transform hover:scale-110 transition duration-500 ease-in-out"
                src="{{ asset('img/LOGO.png') }}"
                alt="Logo"
            >
        </a>
    
        <!-- Titulo -->
        <h1 class="text-4xl font-bold text-center text-gray-100 mb-10">Materias de {{ $carreras->nombre }}</h1>

    
        <!-- Profile Button -->
        <a href="{{ route('profile.edit') }}" class="bg-gradient-to-r z-20 from-purple-600 to-indigo-500 hover:from-indigo-600 hover:to-purple-600 text-white px-6 py-3 rounded-full shadow-2xl transition transform hover:scale-105 hover:shadow-lg duration-300 ease-in-out">
            Mi perfil
        </a>
    </div>
</header>

<body class="bg-gradient-to-r from-blue-50 to-blue-100">
    <div class="container mx-auto p-8">
        
        @if ($semestreCarreras->isEmpty())
            <p class="text-center text-gray-600">No hay materias registradas para esta carrera.</p>
        @else
            <!-- Contenedor de semestres -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach ($semestreCarreras as $semestreCarrera)
                    <!-- Tarjeta de Semestre -->
                    <div class="bg-white shadow-lg rounded-lg p-6 transition-transform transform hover:scale-105">
                        <h2 class="text-xl font-semibold text-gray-900 mb-4">
                            {{ $semestreCarrera->semestre->nombre }}
                        </h2>
                        
                        <!-- Materias -->
                        @foreach ([ 
                            $semestreCarrera->materia1,
                            $semestreCarrera->materia2,
                            $semestreCarrera->materia3,
                            $semestreCarrera->materia4,
                            $semestreCarrera->materia5,
                            $semestreCarrera->materia6,
                            $semestreCarrera->materia7,
                            $semestreCarrera->materia8,
                            $semestreCarrera->materia9,
                            $semestreCarrera->materia10
                        ] as $materia)
                            @if ($materia)
                                <div class="mb-3">
                                    <h3 
                                        class="text-md font-medium text-blue-700 cursor-pointer hover:underline"
                                        onclick="toggleDetails({{ $materia->id }})"
                                    >
                                        {{ $materia->nombre }}
                                    </h3>

                                    <!-- Detalles de la materia -->
                                    <div id="details-{{ $materia->id }}" class="hidden mt-3 bg-blue-50 p-3 rounded-lg shadow-inner">
                                        <h4 class="text-sm font-bold text-blue-600">Materiales:</h4>
                                        <ul class="list-disc pl-5 mt-2">
                                            @foreach ($materiales->where('materia_id', $materia->id) as $material)
                                                <li class="text-gray-700">
                                                    {{ $material->descripcion }}

                                                    <!-- Previsualización según tipo de material -->
                                                    @if ($material->tipo->nombre === 'Video')
                                                        <video 
                                                            src="{{ route('video.show', ['filename' => basename($material->archivo)]) }}" 
                                                            controls 
                                                            class="w-full h-40 rounded-lg shadow-md mt-2"
                                                        ></video>
                                                    @elseif ($material->tipo->nombre === 'PDF')
                                                        <iframe 
                                                            src="{{ route('pdf.show', ['filename' => basename($material->archivo)]) }}" 
                                                            class="w-full h-40 border border-gray-300 rounded-lg shadow-md mt-2"
                                                        ></iframe>
                                                        <a href="{{ route('pdf.show', ['filename' => basename($material->archivo)]) }}" 
                                                            target="_blank" 
                                                            class="text-blue-500 hover:text-blue-700 transition duration-300 mt-2 inline-block"
                                                        >
                                                            Ver PDF en pantalla completa
                                                        </a>
                                                    @else
                                                        <a href="{{ asset('storage/' . $material->archivo) }}" 
                                                            target="_blank" 
                                                            class="text-blue-500 hover:text-blue-700 transition duration-300 block mt-2"
                                                        >
                                                            Ver Archivo
                                                        </a>
                                                    @endif
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</body>
</html>
