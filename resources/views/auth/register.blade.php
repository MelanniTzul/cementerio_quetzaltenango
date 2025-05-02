<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Nombre -->
        <div>
            <x-input-label for="nombre" :value="__('Nombre*')" />
            <x-text-input id="nombre" class="block mt-1 w-full" type="text" name="nombre" :value="old('nombre')" required autofocus autocomplete="given-name" />
            <x-input-error :messages="$errors->get('nombre')" class="mt-2" />
        </div>

        <!-- Apellido -->
        <div class="mt-4">
            <x-input-label for="apellido" :value="__('Apellido*')" />
            <x-text-input id="apellido" class="block mt-1 w-full" type="text" name="apellido" :value="old('apellido')" required autocomplete="family-name" />
            <x-input-error :messages="$errors->get('apellido')" class="mt-2" />
        </div>

        <!-- DPI -->
        <div class="mt-4">
            <x-input-label for="dpi" :value="__('DPI*')" />
            <x-text-input id="dpi" class="block mt-1 w-full" type="text" name="dpi" :value="old('dpi')" required autocomplete="off" maxlength="13" pattern="\d{13}" title="El DPI debe contener exactamente 13 números." />
            <x-input-error :messages="$errors->get('dpi')" class="mt-2" />
        </div>

        <!-- Correo Electrónico -->
        <div class="mt-4">
            <x-input-label for="correo" :value="__('Correo Electrónico*')" />
            <x-text-input id="correo" class="block mt-1 w-full" type="text" name="correo" :value="old('correo')" required autocomplete="off" />
            <x-input-error :messages="$errors->get('correo')" class="mt-2" />
        </div>

        <!-- Contraseña -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Contraseña*')" />
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirmar Contraseña -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirmar Contraseña*')" />
            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('¿Ya estás registrado?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Registrarse') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
