<nav class="bg-[#051B3F] text-white shadow">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16 items-center">
            <!-- Logo -->
            <a href="/" class="flex items-center font-black text-lg">
                <img src="/img/SUCooperative - Logo Horizontal Blanco.png" alt="Logo SUC" class="h-8 w-auto mr-2">
            </a>

            <!-- Desktop Menu -->
            <div class="hidden md:flex space-x-6 items-center text-sm font-semibold">
                <a href="#inicio" class="hover:text-[#C54793]">Inicio</a>
                <div class="relative group">
                    <button class="hover:text-[#C54793] focus:outline-none">Nosotros ▾</button>
                    <div class="absolute z-10 hidden group-hover:block bg-white text-[#051B3F] shadow-md mt-2 rounded">
                        <a href="#mision" class="block px-4 py-2 hover:bg-gray-100">Misión y Visión</a>
                        <a href="#equipo" class="block px-4 py-2 hover:bg-gray-100">Nuestro Equipo</a>
                    </div>
                </div>
                <a href="{{ route('proyectos.index') }}" class="text-sm" class="hover:text-[#C54793]">Proyectos</a>
                <a href="#contacto" class="hover:text-[#C54793]">Contacto</a>
                <a href="{{ route('eventos.index') }}" class="text-sm" class="hover:text-[#C54793]">Eventos</a>
            </div>

            <!-- Botones Acción -->
            <div class="hidden md:flex space-x-3 items-center">
                <a href="{{ route('login') }}" class="hover:underline text-white font-medium">Iniciar Sesión</a>
                <a href="{{ route('register') }}" class="bg-white text-[#051B3F] px-3 py-1.5 rounded font-bold hover:bg-gray-100">Registrarse</a>
                <a href="#donar" class="bg-[#C54793] text-white px-3 py-1.5 rounded font-bold hover:bg-pink-700">Donar</a>
            </div>

            <!-- Mobile button -->
            <div class="md:hidden flex items-center">
                <button id="menu-toggle" class="text-white focus:outline-none">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2"
                         viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div id="mobile-menu" class="md:hidden hidden px-4 pb-4 space-y-2 text-sm font-medium bg-[#051B3F] text-white">
        <a href="#inicio" class="block hover:text-[#C54793]">Inicio</a>
        <a href="#mision" class="block hover:text-[#C54793]">Nosotros</a>
        <a href="#proyectos" class="block hover:text-[#C54793]">Proyectos</a>
        <a href="#contacto" class="block hover:text-[#C54793]">Contacto</a>
        <a href="#eventos" class="block hover:text-[#C54793]">Eventos</a>
        <a href="{{ route('login') }}" class="block hover:underline">Iniciar Sesión</a>
        <a href="{{ route('register') }}" class="block bg-white text-[#051B3F] px-3 py-1 rounded font-bold hover:bg-gray-100">Registrarse</a>
        <a href="#donar" class="block bg-[#C54793] text-white px-3 py-1 rounded font-bold hover:bg-pink-700">Donar</a>
    </div>

    <script>
        document.getElementById('menu-toggle').addEventListener('click', function () {
            const menu = document.getElementById('mobile-menu');
            menu.classList.toggle('hidden');
        });
    </script>
</nav>
