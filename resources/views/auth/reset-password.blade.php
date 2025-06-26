<x-guest-layout>
    <div class="min-h-screen bg-white flex flex-col justify-center items-center px-6 py-12">

        <!-- Logo -->
        <div class="mb-8">
            <a href="/">
                <img src="{{ asset('img/SUCooperative-Logo-Vertical.png') }}" alt="Logo SUC" class="w-40 h-40 mx-auto">
            </a>
        </div>

        <!-- Título -->
        <h2 class="text-2xl font-bold text-[#051B3F] mb-6">Restablecer contraseña</h2>

        <!-- Formulario -->
        <div class="w-full max-w-md">
            <form method="POST" action="{{ route('password.store') }}" class="space-y-5">
                @csrf

                <!-- Token oculto -->
                <input type="hidden" name="token" value="{{ $request->route('token') }}">

                <!-- Email -->
                <div>
                    <label for="email" class="block text-sm font-medium text-[#051B3F] mb-1">Correo electrónico</label>
                    <input id="email" type="email" name="email" value="{{ old('email', $request->email) }}" required autofocus
                        class="w-full border border-gray-300 rounded-md px-3 py-2 focus:ring-[#346BB3] focus:border-[#346BB3]">
                    <x-input-error :messages="$errors->get('email')" class="text-sm text-red-600 mt-1" />
                </div>

                <!-- Nueva contraseña -->
                <div>
                    <label for="password" class="block text-sm font-medium text-[#051B3F] mb-1">Nueva contraseña</label>
                    <input id="password" type="password" name="password" required
                        class="w-full border border-gray-300 rounded-md px-3 py-2 focus:ring-[#346BB3] focus:border-[#346BB3]">
                    <x-input-error :messages="$errors->get('password')" class="text-sm text-red-600 mt-1" />
                </div>

                <!-- Confirmar contraseña -->
                <div>
                    <label for="password_confirmation" class="block text-sm font-medium text-[#051B3F] mb-1">Confirmar contraseña</label>
                    <input id="password_confirmation" type="password" name="password_confirmation" required
                        class="w-full border border-gray-300 rounded-md px-3 py-2 focus:ring-[#346BB3] focus:border-[#346BB3]">
                    <x-input-error :messages="$errors->get('password_confirmation')" class="text-sm text-red-600 mt-1" />
                </div>

                <!-- Botón -->
                <div class="flex justify-end pt-2">
                    <button type="submit"
                        class="bg-[#051B3F] text-white font-semibold px-6 py-2 rounded hover:bg-gray-900 transition">
                        Restablecer contraseña
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
