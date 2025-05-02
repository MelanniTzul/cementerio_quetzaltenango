<x-guest-layout>
    <!-- Estado de la sesión -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Correo electrónico -->
        <div>
            <x-input-label for="correo" :value="'Correo electrónico'" />
            <x-text-input id="correo" class="block mt-1 w-full" type="email" name="correo"
                :value="old('correo')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('correo')" class="mt-2" />
        </div>

        <!-- Contraseña -->
        <div class="mt-4" x-data="{ show: false }">
            <x-input-label for="contrasena" :value="'Contraseña'" />
            <div class="relative">
                <input :type="show ? 'text' : 'password'"
                    name="contrasena"
                    id="contrasena"
                    required
                    autocomplete="current-password"
                    class="block w-full mt-1 rounded-md border-gray-300 shadow-sm pr-12 focus:ring-blue-500 focus:border-blue-500" />
                <!-- Ojito dentro del input -->
                <div class="absolute inset-y-0 right-0 flex items-center px-3">
                    <button type="button" @click="show = !show" class="focus:outline-none">
                        <svg x-show="!show" xmlns="http://www.w3.org/2000/svg"
                            class="h-5 w-5 text-gray-500" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                        </svg>
                        <svg x-show="show" xmlns="http://www.w3.org/2000/svg"
                            class="h-5 w-5 text-gray-500" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.542-7a10.06 10.06 0 012.212-3.592M9.88 9.88a3 3 0 104.24 4.24M3 3l18 18" />
                        </svg>
                    </button>
                </div>
            </div>
            <x-input-error :messages="$errors->get('contrasena')" class="mt-2" />
        </div>

        <!-- Recordarme -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox"
                    class="rounded border-gray-300 text-blue-600 shadow-sm focus:ring-blue-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">Recordarme</span>
            </label>
        </div>

        <!-- Enlace y botón -->
        <div class="flex items-center justify-end mt-4">
            <x-primary-button class="ms-3 bg-blue-600 hover:bg-blue-700">
                Iniciar sesión
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
