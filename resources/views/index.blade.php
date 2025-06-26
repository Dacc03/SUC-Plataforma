<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Fundación SUC</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
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

    <!-- Hero principal -->
    <main class="py-16">
        <div class="max-w-5xl mx-auto px-6 text-center">
            <h2 class="text-4xl font-extrabold mb-6 leading-tight">Trascendiendo en servicio</h2>
            <p class="text-lg mb-8">
                SUCooperative es una fundación cristiana que impulsa un ecosistema sustentable para servir a Dios y al prójimo a través del liderazgo, el emprendimiento y la ayuda social.
            </p>
            <a href="{{ route('register') }}" class="bg-[#C54793] text-white px-6 py-3 rounded shadow hover:bg-pink-700 transition text-lg">
                ¡Súmate al cambio!
            </a>
        </div>
    </main>

    <!-- Sección misión y visión -->
    <section class="bg-gray-100 py-12">
        <div class="max-w-6xl mx-auto px-6 grid md:grid-cols-2 gap-12">
            <div>
                <h3 class="text-2xl font-bold mb-3">Nuestra Misión</h3>
                <p>
                    Ser una comunidad cristiana que desarrolla un ecosistema socioeconómico y sustentable para acelerar la adopción del Emprendimiento Social y la transición energética, empoderando líderes que trasciendan el servicio a Dios y al prójimo.
                </p>
            </div>
            <div>
                <h3 class="text-2xl font-bold mb-3">Nuestros Valores</h3>
                <ul class="list-disc list-inside">
                    <li>Amor</li>
                    <li>Esperanza</li>
                    <li>Fe</li>
                    <li>Unión</li>
                </ul>
            </div>
        </div>
    </section>

    <!-- Sección Donar -->
    <section id="donar" class="bg-[#C54793] text-white py-16 px-6">
        <div class="max-w-5xl mx-auto text-center">
            <h2 class="text-3xl font-extrabold mb-4">¡Súmate como donante!</h2>
            <p class="text-lg mb-6">
                Tu aporte nos permite llevar esperanza, educación y ayuda a comunidades vulnerables.
                Cualquier contribución es valiosa y marca una diferencia.
            </p>
            <a href="#" class="inline-block bg-white text-[#C54793] font-bold px-6 py-3 rounded shadow hover:bg-gray-100 transition">
                Donar ahora
            </a>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-[#051B3F] text-white mt-16 shadow-inner">
        <div class="max-w-7xl mx-auto px-4 py-6 text-center text-sm">
            &copy; {{ date('Y') }} SUCooperative - Fundación Solo Una Cruz. Todos los derechos reservados.
        </div>
    </footer>

</body>

</html>