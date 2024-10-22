{{-- resources/views/crud/material_materia/public_index.blade.php --}}
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Materiales</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}"> {{-- Asegúrate de tener tu CSS --}}
</head>
<body>
    <h1 class="text-xl font-bold">Lista de Materiales</h1>
    <ul>
        @foreach($materiales as $material)
            <li>
                <strong>{{ $material->descripcion }}</strong>
                @if($material->tipo->nombre === 'Video')
                    <video src="{{ route('video.show', ['filename' => basename($material->archivo)]) }}" controls class="w-24"></video>
                @elseif($material->tipo->nombre === 'PDF')
                    <a href="{{ route('pdf.show', ['filename' => basename($material->archivo)]) }}" target="_blank" class="text-blue-500 hover:text-blue-700 transition duration-300">Ver PDF</a>
                @else
                    <a href="{{ asset('storage/' . $material->archivo) }}" target="_blank" class="text-blue-500 hover:text-blue-700 transition duration-300">Ver Archivo</a>
                @endif
            </li>
        @endforeach
    </ul>
</body>
</html>
