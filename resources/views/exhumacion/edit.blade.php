<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-semibold text-gray-800 leading-tight">Editar Exhumación</h2>
    </x-slot>

    <div class="py-10 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white shadow-md rounded p-6">
            @if(session('error'))
            <div class="mb-4 text-red-700 bg-red-100 border border-red-300 rounded-md px-4 py-2 text-center">
                {{ session('error') }}
            </div>
            @endif

            <form action="{{ route('exhumacion.update', $exhumacion->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 gap-5">

                    <div>
                        <x-input-label for="solicitante" value="Solicitante*" />
                        <x-text-input name="solicitante" class="w-full mt-1" required
                            value="{{ old('solicitante', $exhumacion->solicitante) }}" />
                    </div>

                    <div>
                        <x-input-label for="id_ocupante" value="Ocupante*" />
                        <select name="id_ocupante" class="w-full mt-1 border-gray-300 rounded" required>
                            <option value="">Seleccione un ocupante</option>
                            @foreach($ocupantes as $ocupante)
                            <option value="{{ $ocupante->id }}"
                                {{ $ocupante->id == $exhumacion->id_ocupante ? 'selected' : '' }}>
                                {{ $ocupante->nombre }} {{ $ocupante->apellido }} ({{ $ocupante->dpi }})
                            </option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <x-input-label for="fecha_solicitud" value="Fecha solicitud*" />
                        <x-text-input name="fecha_solicitud" type="date" class="w-full mt-1" required
                            value="{{ old('fecha_solicitud', \Illuminate\Support\Str::limit($exhumacion->fecha_solicitud, 10, '') ) }}" />
                    </div>

                    <div>
                        <x-input-label for="motivo" value="Motivo*" />
                        <x-text-input name="motivo" class="w-full mt-1" required
                            value="{{ old('motivo', $exhumacion->motivo) }}" />
                    </div>


                </div>
                <br>
                <div class="mt-8 flex justify-between">
                    <a href="{{ route('exhumacion.index') }}"
                        class="bg-gray-200 text-gray-800 px-4 py-2 rounded hover:bg-gray-300 transition">
                        ← Cancelar
                    </a>
                    <x-primary-button class="px-6 py-2">Actualizar</x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
