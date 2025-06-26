<x-guest-layout>
    <div class="min-h-screen bg-white flex flex-col justify-center items-center px-6 py-12">

        <!-- Logo -->
        <div class="mb-8">
            <a href="/">
                <img src="{{ asset('img/SUCooperative-Logo-Vertical.png') }}" alt="Logo SUC" class="w-40 h-40 mx-auto">
            </a>
        </div>

        <!-- Título -->
        <h2 class="text-2xl font-bold text-[#051B3F] mb-4">¿Olvidaste tu contraseña?</h2>

        <!-- Descripción -->
        <p class="text-sm text-gray-600 mb-6 text-center max-w-md">
            No hay problema. Ingresa tu dirección de correo electrónico y te enviaremos un enlace para restablecer tu contraseña.
        </p>

        <!-- Formulario -->
        <div class="w-full max-w-md">
            <!-- Estado de la sesión -->
            <x-auth-session-status class="mb-4 text-green-600" :status="session('status')" />

            <form method="POST" action="{{ route('password.email') }}" class="space-y-5">
                @csrf

                <!-- Email -->
                <div>
                    <label for="email" class="block text-sm font-medium text-[#051B3F] mb-1">Correo electrónico</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
                        class="w-full border border-gray-300 rounded-md px-3 py-2 focus:ring-[#346BB3] focus:border-[#346BB3]">
                    <x-input-error :messages="$errors->get('email')" class="mt-1 text-red-600 text-sm" />
                </div>

                <!-- Botón -->
                <div>
                    <button type="submit"
                        class="w-full bg-[#051B3F] text-white font-semibold py-2 rounded hover:bg-gray-900 transition">
                        Enviar enlace para restablecer contraseña
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
