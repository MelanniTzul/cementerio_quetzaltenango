<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
            Crear Ocupante
        </h2>
    </x-slot>

    <div class="py-10 max-w-xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white shadow-md rounded-lg p-6">
            <form action="{{ route('ocupantes.store') }}" method="POST">
                @csrf

                <div class="grid grid-cols-1 gap-5">
                    <div>
                        <x-input-label for="nombre" value="Nombre*" />
                        <x-text-input name="nombre" class="w-full mt-1" required />
                    </div>

                    <div>
                        <x-input-label for="apellido" value="Apellido*" />
                        <x-text-input name="apellido" class="w-full mt-1" required />
                    </div>

                    <div>
                        <x-input-label for="dpi" value="DPI*" />
                        <x-text-input name="dpi" class="w-full mt-1"
                            required maxlength="13" pattern="\d{13}" title="Debe contener exactamente 13 dígitos" />
                    </div>

                    <div>
                        <x-input-label for="id_municipio" value="Municipio*" />
                        <select name="id_municipio" class="w-full mt-1 border-gray-300 rounded" required>
                            @foreach($municipio as $m)
                            <option value="{{ $m->id }}">{{ $m->nombre }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <x-input-label for="fecha_fallecimiento" value="Fecha de Fallecimiento*" />
                        <x-text-input type="date" name="fecha_fallecimiento" class="w-full mt-1" required />
                    </div>

                    <div>
                        <x-input-label for="causa_muerte" value="Causa de Muerte" />
                        <x-text-input name="causa_muerte" class="w-full mt-1" />
                    </div>

                    <div>
                        <x-input-label for="id_genero" value="Género*" />
                        <select name="id_genero" class="w-full mt-1 border-gray-300 rounded" required>
                            @foreach($genero as $g)
                            <option value="{{ $g->id }}">{{ $g->nombre }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <x-input-label for="id_nicho" value="Nicho*" />
                        <select name="id_nicho" class="w-full mt-1 border-gray-300 rounded" required>
                            @foreach($nicho as $n)
                            <option value="{{ $n->id }}">{{ $n->codigo }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <x-input-label for="personaje_historico" value="¿Personaje histórico?*" />
                        <select name="personaje_historico" class="w-full mt-1 border-gray-300 rounded" required>
                            <option value="0">No</option>
                            <option value="1">Sí</option>
                        </select>
                    </div>
                </div>
                <br>
                <div class="mt-8 text-right">

                    <x-primary-button class="px-6 py-2">
                        Guardar Ocupante
                    </x-primary-button>

                    <a href="{{ route('ocupantes.index') }}"
                        class="bg-blue-100 text-blue-700 px-4 py-2 rounded hover:bg-blue-200 transition">
                        ← Volver a la lista
                    </a>

                </div>
            </form>
        </div>
    </div>
</x-app-layout>
