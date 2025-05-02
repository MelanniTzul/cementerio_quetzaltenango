<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-semibold text-gray-800 leading-tight">Editar Responsable</h2>
    </x-slot>

    <div class="py-10 max-w-xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white shadow-md rounded-lg p-6">
            <form action="{{ route('responsables.update', $responsable->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 gap-6">
                    <div>
                        <x-input-label for="nombre" value="Nombre*" />
                        <x-text-input name="nombre" class="w-full mt-1" value="{{ $responsable->nombre }}" required />
                    </div>
                    <div>
                        <x-input-label for="apellido" value="Apellido*" />
                        <x-text-input name="apellido" class="w-full mt-1" value="{{ $responsable->apellido }}" required />
                    </div>
                    <div>
                        <x-input-label for="dpi" value="DPI*" />
                        <x-text-input name="dpi" class="w-full mt-1" value="{{ $responsable->dpi }}" maxlength="13" pattern="\d{13}" required />
                    </div>
                    <div>
                        <x-input-label for="direccion" value="Dirección" />
                        <x-text-input name="direccion" class="w-full mt-1" value="{{ $responsable->direccion }}" />
                    </div>
                    <div>
                        <x-input-label for="telefono" value="Teléfono" />
                        <x-text-input name="telefono" class="w-full mt-1" value="{{ $responsable->telefono }}" />
                    </div>
                    <div>
                        <x-input-label for="correo" value="Correo" />
                        <x-text-input name="correo" type="email" class="w-full mt-1" value="{{ $responsable->correo }}" />
                    </div>
                    <div>
                        <x-input-label for="id_municipio" value="Municipio*" />
                        <select name="id_municipio" class="w-full mt-1 border-gray-300 rounded" required>
                            @foreach($municipios as $municipio)
                                <option value="{{ $municipio->id }}" {{ $responsable->id_municipio == $municipio->id ? 'selected' : '' }}>
                                    {{ $municipio->nombre }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <br>

                <div class="mt-8 flex justify-between">
                    <a href="{{ route('responsables.index') }}"
                       class="bg-gray-200 text-gray-800 px-4 py-2 rounded hover:bg-gray-300 transition">
                        ← Cancelar
                    </a>
                    <x-primary-button class="px-6 py-2">Actualizar</x-primary-button>
                </div>
                <br>
            </form>
        </div>
    </div>
</x-app-layout>
