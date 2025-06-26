@php
    use Illuminate\Support\Str;
@endphp

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>📅 Eventos de la Fundación</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/alpinejs" defer></script>
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

    <div class="max-w-7xl mx-auto py-10 px-4">
        <h1 class="text-3xl font-extrabold text-center text-[#C54793] mb-8">📅 Próximos Eventos 📅</h1>

        @if($eventos->count())
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($eventos as $evento)
                    <div class="bg-white rounded-2xl shadow hover:shadow-lg transition duration-300 p-5 flex flex-col justify-between" x-data="{ open: false }">
                        <div>
                            <h2 class="text-xl font-bold">{{ $evento->titulo }}</h2>
                            <p class="text-sm text-gray-700 mt-2">{{ Str::limit($evento->descripcion, 100) }}</p>
                            <p class="text-sm mt-2"><strong>Fecha:</strong> {{ \Carbon\Carbon::parse($evento->fecha_inicio)->format('d M Y') }}
                                @if($evento->fecha_fin && $evento->fecha_fin !== $evento->fecha_inicio)
                                    – {{ \Carbon\Carbon::parse($evento->fecha_fin)->format('d M Y') }}
                                @endif
                            </p>
                            <p class="text-sm"><strong>Hora:</strong> {{ \Carbon\Carbon::parse($evento->hora)->format('H:i') }}</p>
                        </div>

                        <button @click="open = true"
                            class="mt-4 bg-[#C54793] text-white px-4 py-2 text-sm rounded hover:bg-pink-700">
                            Ver Detalles
                        </button>

                        <!-- Modal -->
                        <div x-show="open" x-cloak
                             class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
                            <div class="bg-white rounded-lg shadow-lg max-w-xl w-full p-6 relative">
                                <button @click="open = false"
                                        class="absolute top-2 right-2 text-gray-500 hover:text-red-500 text-xl">&times;</button>

                                <h2 class="text-2xl font-bold mb-4 text-[#C54793]">{{ $evento->titulo }}</h2>

                                <ul class="text-sm text-gray-700 space-y-2">
                                    <li><strong>Tipo:</strong> {{ ucfirst($evento->tipo ?? 'Otro') }}</li>
                                    <li><strong>Fecha de Inicio:</strong> {{ \Carbon\Carbon::parse($evento->fecha_inicio)->format('d/m/Y') }}</li>
                                    @if($evento->fecha_fin && $evento->fecha_fin !== $evento->fecha_inicio)
                                        <li><strong>Fecha de Fin:</strong> {{ \Carbon\Carbon::parse($evento->fecha_fin)->format('d/m/Y') }}</li>
                                    @endif
                                    <li><strong>Hora:</strong> {{ $evento->hora ? \Carbon\Carbon::parse($evento->hora)->format('H:i') : 'No especificada' }}</li>
                                    <li><strong>Modalidad:</strong> {{ $evento->modalidad ?? 'No especificada' }}</li>
                                    <li><strong>Ubicación:</strong> {{ $evento->ubicacion ?? 'No especificada' }}</li>
                                </ul>

                                <div class="mt-4">
                                    <h4 class="font-semibold">Descripción</h4>
                                    <p class="text-sm mt-1">{!! nl2br(e($evento->descripcion)) ?: 'Sin descripción disponible.' !!}</p>
                                </div>
                            </div>
                        </div>
                        <!-- Fin Modal -->
                    </div>
                @endforeach
            </div>

            <div class="mt-8">
                {{ $eventos->links() }}
            </div>
        @else
            <div class="text-center text-gray-600 bg-blue-100 border border-blue-300 p-4 rounded">
                No hay eventos programados por ahora. ¡Vuelve pronto!
            </div>
        @endif
    </div>
</body>
</html>
