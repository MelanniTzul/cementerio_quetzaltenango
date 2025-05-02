<x-app-layout >
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
            Crear Contrato
        </h2>
    </x-slot>

    <div class="py-10 max-w-xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white shadow-md rounded-lg p-6">
            <form action="{{ route('contratos.store') }}" method="POST">
                @csrf

                <div class="grid grid-cols-1 gap-5">

                    {{-- Responsable --}}
                    <div>
                        <x-input-label for="id_responsable" value="Responsable*" />
                        <select name="id_responsable" class="w-full mt-1 border-gray-300 rounded" required>
                            @foreach($responsables as $r)
                                <option value="{{ $r->id }}">{{ $r->nombre }} {{ $r->apellido }}</option>
                            @endforeach
                        </select>
                    </div>

                    {{-- Nicho --}}
                    <div>
                        <x-input-label for="id_nicho" value="Nicho*" />
                        <select name="id_nicho" class="w-full mt-1 border-gray-300 rounded" required>
                            @foreach($nichos as $n)
                                <option value="{{ $n->id }}">{{ $n->codigo }}</option>
                            @endforeach
                        </select>
                    </div>

                    {{-- Ocupante --}}
                    <div>
                        <x-input-label for="id_ocupante" value="Ocupante*" />
                        <select name="id_ocupante" class="w-full mt-1 border-gray-300 rounded" required>
                            @foreach($ocupantes as $o)
                                <option value="{{ $o->id }}">{{ $o->nombre }} {{ $o->apellido }}</option>
                            @endforeach
                        </select>
                    </div>

                    {{-- Fecha de Inicio --}}
                    <div>
                        <x-input-label for="fecha_inicio" value="Fecha de Inicio*" />
                        <x-text-input type="date" name="fecha_inicio" class="w-full mt-1" required />
                    </div>

                    {{-- Fecha de Fin --}}
                    <div>
                        <x-input-label for="fecha_fin" value="Fecha de Fin*" />
                        <x-text-input type="date" name="fecha_fin" class="w-full mt-1" />
                    </div>

                    {{-- Monto --}}
                    <div>
                        <x-input-label for="monto" value="Monto*" />
                        <x-text-input type="number" name="monto" step="0.01" class="w-full mt-1" />
                    </div>

                </div>
<br>
                {{-- Botón --}}
                <div class="mt-8 flex justify-between">
                    <a href="{{ route('contratos.index') }}"
                        class="bg-gray-200 text-gray-800 px-4 py-2 rounded hover:bg-gray-300 transition">
                        ← Cancelar
                    </a>

                    <x-primary-button class="px-6 py-2">
                        Guardar Contrato
                    </x-primary-button>
                </div>
                <br>
            </form>
        </div>
    </div>
</x-app-layout>
