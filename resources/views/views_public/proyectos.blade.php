@php
    use Illuminate\Support\Str;
@endphp

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>🌟 Proyectos publicados 🌟</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.tailwindcss.com"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;900&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }

        html {
            scroll-behavior: smooth;
        }
    </style>
</head>

<body class="bg-white text-[#051B3F]">
    <!-- Nav -->
    <x-public-nav />

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
        <h2 class="text-3xl font-extrabold text-center text-[#C54793] mb-10">
            🌟 Proyectos Publicados 🌟
        </h2>

        @if($proyectos->isEmpty())
            <div class="text-center text-gray-600 bg-blue-100 border border-blue-300 p-4 rounded">
                No hay proyectos disponibles por el momento.
            </div>
        @else
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($proyectos as $proyecto)
                    <div class="bg-white rounded-2xl shadow hover:shadow-lg transition duration-300 overflow-hidden flex flex-col">
                        @if($proyecto->adjunto)
                            <img src="{{ asset('storage/' . $proyecto->adjunto) }}" alt="Imagen del proyecto"
                                 class="w-full h-48 object-cover">
                        @else
                            <img src="https://via.placeholder.com/600x200?text=Sin+Imagen" alt="Sin imagen"
                                 class="w-full h-48 object-cover">
                        @endif

                        <div class="p-5 flex flex-col flex-1">
                            <h3 class="text-xl font-bold mb-2">{{ $proyecto->titulo }}</h3>
                            <p class="text-sm text-gray-700 mb-3">
                                {{ Str::limit($proyecto->descripcion, 100) }}
                            </p>
                            <p class="text-sm text-gray-600"><strong>📅 Inicio:</strong> {{ $proyecto->fecha_inicio }}</p>
                            <p class="text-sm text-gray-600"><strong>🗓️ Fin:</strong> {{ $proyecto->fecha_fin }}</p>
                            <p class="text-sm text-gray-600"><strong>👤 Publicado por:</strong>
                                {{ $proyecto->user->name ?? 'Usuario no disponible' }}
                            </p>

                            <div class="mt-4">
                                <span class="inline-block bg-[#C54793] text-white text-xs font-semibold px-3 py-1 rounded-full">
                                    {{ $proyecto->nivel_progreso }}
                                </span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</body>
</html>
