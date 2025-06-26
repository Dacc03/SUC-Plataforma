<x-guest-layout>
    <div class="min-h-screen bg-white flex flex-col justify-center items-center px-6 py-12">


        <!-- Título -->
        <h2 class="text-2xl font-bold text-[#051B3F] mb-6">Regístrate en SUCooperative</h2>

        <!-- Formulario -->
        <div class="w-full max-w-xl">
            <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data" class="space-y-5">
                @csrf

                <!-- Name -->
                <div>
                    <label for="name" class="block text-sm font-medium text-[#051B3F] mb-1">Nombre de usuario</label>
                    <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus
                        class="w-full border border-gray-300 rounded-md px-3 py-2 focus:ring-[#346BB3] focus:border-[#346BB3]">
                    <x-input-error :messages="$errors->get('name')" class="mt-1 text-red-600 text-sm" />
                </div>

                <!-- Email -->
                <div>
                    <label for="email" class="block text-sm font-medium text-[#051B3F] mb-1">Correo electrónico</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required
                        class="w-full border border-gray-300 rounded-md px-3 py-2 focus:ring-[#346BB3] focus:border-[#346BB3]">
                    <x-input-error :messages="$errors->get('email')" class="mt-1 text-red-600 text-sm" />
                </div>

                <!-- Password -->
                <div>
                    <label for="password" class="block text-sm font-medium text-[#051B3F] mb-1">Contraseña</label>
                    <input id="password" type="password" name="password" required
                        class="w-full border border-gray-300 rounded-md px-3 py-2 focus:ring-[#346BB3] focus:border-[#346BB3]">
                    <x-input-error :messages="$errors->get('password')" class="mt-1 text-red-600 text-sm" />
                </div>

                <!-- Confirm Password -->
                <div>
                    <label for="password_confirmation" class="block text-sm font-medium text-[#051B3F] mb-1">Confirmar contraseña</label>
                    <input id="password_confirmation" type="password" name="password_confirmation" required
                        class="w-full border border-gray-300 rounded-md px-3 py-2 focus:ring-[#346BB3] focus:border-[#346BB3]">
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-1 text-red-600 text-sm" />
                </div>

                <!-- Perfil -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label for="nombres" class="block text-sm font-medium text-[#051B3F] mb-1">Nombres</label>
                        <input type="text" name="nombres" required
                            class="w-full border border-gray-300 rounded-md px-3 py-2 focus:ring-[#346BB3] focus:border-[#346BB3]">
                    </div>
                    <div>
                        <label for="apellidos" class="block text-sm font-medium text-[#051B3F] mb-1">Apellidos</label>
                        <input type="text" name="apellidos" required
                            class="w-full border border-gray-300 rounded-md px-3 py-2 focus:ring-[#346BB3] focus:border-[#346BB3]">
                    </div>
                    <div>
                        <label for="dni" class="block text-sm font-medium text-[#051B3F] mb-1">DNI</label>
                        <input type="text" name="dni" required
                            class="w-full border border-gray-300 rounded-md px-3 py-2 focus:ring-[#346BB3] focus:border-[#346BB3]">
                    </div>
                    <div>
                        <label for="fecha_nacimiento" class="block text-sm font-medium text-[#051B3F] mb-1">Fecha de nacimiento</label>
                        <input type="date" name="fecha_nacimiento" required
                            class="w-full border border-gray-300 rounded-md px-3 py-2 text-[#051B3F] focus:ring-[#346BB3] focus:border-[#346BB3]">
                    </div>
                    <div>
                        <label for="telefono" class="block text-sm font-medium text-[#051B3F] mb-1">Teléfono</label>
                        <input type="text" name="telefono"
                            class="w-full border border-gray-300 rounded-md px-3 py-2 focus:ring-[#346BB3] focus:border-[#346BB3]">
                    </div>
                    <div>
                        <label for="genero" class="block text-sm font-medium text-[#051B3F] mb-1">Género</label>
                        <select name="genero"
                            class="w-full border border-gray-300 rounded-md px-3 py-2 text-[#051B3F] focus:ring-[#346BB3] focus:border-[#346BB3]">
                            <option value="">Selecciona</option>
                            <option value="Masculino">Masculino</option>
                            <option value="Femenino">Femenino</option>
                        </select>
                    </div>
                    <div class="md:col-span-2">
                        <label for="direccion" class="block text-sm font-medium text-[#051B3F] mb-1">Dirección</label>
                        <textarea name="direccion" rows="2"
                            class="w-full border border-gray-300 rounded-md px-3 py-2 focus:ring-[#346BB3] focus:border-[#346BB3]"></textarea>
                    </div>
                    <div class="md:col-span-2">
                        <label for="foto" class="block text-sm font-medium text-[#051B3F] mb-1">Foto de perfil</label>
                        <input type="file" name="foto" accept="image/*"
                            class="w-full border border-gray-300 rounded-md px-3 py-2 focus:ring-[#346BB3] focus:border-[#346BB3] bg-white">
                    </div>
                </div>
                <!-- Enlace e Botón -->
                <div class="flex items-center justify-between mt-6">
                    <a href="{{ route('login') }}" class="text-[#346BB3] hover:underline text-sm">¿Ya estás registrado?</a>
                    <button type="submit"
                        class="bg-[#051B3F] text-white font-semibold px-6 py-2 rounded hover:bg-gray-900 transition">
                        Registrarse
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
