<x-guest-layout>
    <div class="min-h-screen bg-white flex flex-col justify-center items-center px-6 py-12">

        <!-- Logo -->
        <div class="mb-8">
            <a href="/">
                <img src="{{ asset('img/SUCooperative-Logo-Vertical.png') }}" alt="Logo SUC" class="w-40 h-40 mx-auto">
            </a>
        </div>

        <!-- Título -->
        <h2 class="text-2xl font-bold text-[#051B3F] mb-6">Iniciar sesión en SUCooperative</h2>

        <!-- Formulario -->
        <div class="w-full max-w-md">
            @if (session('status'))
            <div class="mb-4 text-sm text-green-600">
                {{ session('status') }}
            </div>
            @endif

            <form method="POST" action="{{ route('login') }}" class="space-y-5">
                @csrf

                <!-- Email -->
                <div>
                    <label for="email" class="block text-sm font-medium text-[#051B3F] mb-1">Correo electrónico</label>
                    <input id="email" type="email" name="email" required autofocus
                        class="w-full border border-gray-300 rounded-md px-3 py-2 focus:ring-[#346BB3] focus:border-[#346BB3]">
                    @error('email')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Password -->
                <div>
                    <label for="password" class="block text-sm font-medium text-[#051B3F] mb-1">Contraseña</label>
                    <input id="password" type="password" name="password" required
                        class="w-full border border-gray-300 rounded-md px-3 py-2 focus:ring-[#346BB3] focus:border-[#346BB3]">
                    @error('password')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Recordarme -->
                <div class="flex justify-between items-center text-sm">
                    <label class="inline-flex items-center">
                        <input type="checkbox" name="remember" class="rounded text-[#051B3F] border-gray-300">
                        <span class="ml-2 text-[#051B3F]">Recordarme</span>
                    </label>

                    @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="text-[#346BB3] hover:underline">¿Olvidaste tu contraseña?</a>
                    @endif
                </div>

                <!-- Botón -->
                <button type="submit"
                    class="w-full bg-[#051B3F] text-white font-semibold py-2 rounded hover:bg-gray-900 transition">
                    Iniciar sesión
                </button>
            </form>

            <p class="text-sm text-center mt-6 text-[#051B3F]">
                ¿No tienes cuenta?
                <a href="{{ route('register') }}" class="text-[#346BB3] hover:underline font-medium">Regístrate aquí</a>
            </p>
        </div>
    </div>
</x-guest-layout>