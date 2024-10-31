{{-- resources/views/crud/material_materia/public_index.blade.php --}}
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Materiales</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}"> {{-- Asegúrate de tener tu CSS --}}
</head>
<body class="bg-gray-100 text-gray-800">
    <div class="container mx-auto py-8">
        <h1 class="text-3xl font-bold text-center mb-8">Lista de Materiales</h1>
        <ul class="space-y-4">
            @foreach($materiales as $material)
                <li class="bg-white shadow-md rounded-lg p-4">
                    <h2 class="text-lg font-semibold mb-2">{{ $material->descripcion }}</h2>

                    @if($material->tipo->nombre === 'Video')
                        {{-- Video preview - Same size as PDF preview --}}
                        <video 
                            src="{{ route('video.show', ['filename' => basename($material->archivo)]) }}" 
                            controls 
                            class="w-full h-64 rounded-lg shadow-md mx-auto"
                        ></video>

                    @elseif($material->tipo->nombre === 'PDF')
                        {{-- PDF preview --}}
                        <iframe 
                            src="{{ route('pdf.show', ['filename' => basename($material->archivo)]) }}" 
                            class="w-full h-64 border border-gray-300 rounded-lg shadow-md"
                        ></iframe>
                        <div class="mt-2">
                            <a href="{{ route('pdf.show', ['filename' => basename($material->archivo)]) }}" 
                                target="_blank" 
                                class="text-blue-500 hover:text-blue-700 transition duration-300"
                            >
                                Ver PDF en pantalla completa
                            </a>
                        </div>

                    @else
                        {{-- Other files --}}
                        <a href="{{ asset('storage/' . $material->archivo) }}" 
                            target="_blank" 
                            class="text-blue-500 hover:text-blue-700 transition duration-300"
                        >
                            Ver Archivo
                        </a>
                    @endif
                </li>
            @endforeach
        </ul>
    </div>
</body>
</html>
