<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
            Editar Ocupante
        </h2>
    </x-slot>

    <div class="py-10 max-w-xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white shadow-md rounded-lg p-6">
            <form action="{{ route('ocupantes.update', $ocupante->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 gap-5">
                    <div>
                        <x-input-label for="nombre" value="Nombre*" />
                        <x-text-input name="nombre" class="w-full mt-1" value="{{ $ocupante->nombre }}" required />
                    </div>

                    <div>
                        <x-input-label for="apellido" value="Apellido*" />
                        <x-text-input name="apellido" class="w-full mt-1" value="{{ $ocupante->apellido }}" required />
                    </div>

                    <div>
                        <x-input-label for="dpi" value="DPI*" />
                        <x-text-input name="dpi" class="w-full mt-1" value="{{ $ocupante->dpi }}" maxlength="13"
                            pattern="\d{13}" title="Debe contener exactamente 13 dígitos" required />
                    </div>

                    <div>
                        <x-input-label for="fecha_fallecimiento" value="Fecha de Fallecimiento*" />
                        <x-text-input type="date" name="fecha_fallecimiento" class="w-full mt-1"
                            value="{{ $ocupante->fecha_fallecimiento }}" required />
                    </div>

                    <div>
                        <x-input-label for="id_municipio" value="Municipio*" />
                        <select name="id_municipio" class="w-full mt-1 border-gray-300 rounded" required>
                            @foreach($municipio as $m)
                                <option value="{{ $m->id }}" {{ $ocupante->id_municipio == $m->id ? 'selected' : '' }}>
                                    {{ $m->nombre }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <x-input-label for="id_genero" value="Género*" />
                        <select name="id_genero" class="w-full mt-1 border-gray-300 rounded" required>
                            @foreach($genero as $g)
                                <option value="{{ $g->id }}" {{ $ocupante->id_genero == $g->id ? 'selected' : '' }}>
                                    {{ $g->nombre }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <x-input-label for="id_nicho" value="Nicho*" />
                        <select name="id_nicho" class="w-full mt-1 border-gray-300 rounded" required>
                            @foreach($nicho as $n)
                                <option value="{{ $n->id }}" {{ $ocupante->id_nicho == $n->id ? 'selected' : '' }}>
                                    {{ $n->codigo }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <x-input-label for="personaje_historico" value="¿Personaje histórico?*" />
                        <select name="personaje_historico" class="w-full mt-1 border-gray-300 rounded" required>
                            <option value="0" {{ $ocupante->personaje_historico == 0 ? 'selected' : '' }}>No</option>
                            <option value="1" {{ $ocupante->personaje_historico == 1 ? 'selected' : '' }}>Sí</option>
                        </select>
                    </div>

                    <div>
                        <x-input-label for="causa_muerte" value="Causa de Muerte" />
                        <x-text-input name="causa_muerte" class="w-full mt-1"
                            value="{{ $ocupante->causa_muerte }}" />
                    </div>
                </div>
<br>
                <div class="mt-8 flex justify-between">
                    <a href="{{ route('ocupantes.index') }}"
                        class="bg-gray-200 text-gray-800 px-4 py-2 rounded hover:bg-gray-300 transition">
                        ← Cancelar
                    </a>

                    <x-primary-button class="px-6 py-2">
                        Actualizar
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
