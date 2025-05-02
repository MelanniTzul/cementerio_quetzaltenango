<x-app-layout>
    <div class="container mx-auto py-6 px-4">
        <h1 class="text-2xl font-bold mb-4 text-gray-800">Editar Nicho</h1>

        <form method="POST" action="{{ route('nichos.update', $nicho->id) }}">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="codigo" class="block text-sm font-medium text-gray-700">Código</label>
                <input type="text" name="codigo" id="codigo" value="{{ $nicho->codigo }}"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm bg-gray-100" readonly>
            </div>

            <div class="mb-4">
                <label for="id_tipo" class="block text-sm font-medium text-gray-700">Tipo</label>
                <select name="id_tipo" id="id_tipo" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                    @foreach ($tipoNicho as $tipo)
                        <option value="{{ $tipo->id }}" {{ $nicho->id_tipo == $tipo->id ? 'selected' : '' }}>
                            {{ $tipo->nombre }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label for="id_calle" class="block text-sm font-medium text-gray-700">Calle</label>
                <select name="id_calle" id="id_calle" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                    @foreach ($calles as $calle)
                        <option value="{{ $calle->id }}" {{ $nicho->id_calle == $calle->id ? 'selected' : '' }}>
                            {{ $calle->nombre }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label for="id_avenida" class="block text-sm font-medium text-gray-700">Avenida</label>
                <select name="id_avenida" id="id_avenida" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                    @foreach ($avenidas as $avenida)
                        <option value="{{ $avenida->id }}" {{ $nicho->id_avenida == $avenida->id ? 'selected' : '' }}>
                            {{ $avenida->nombre }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label for="id_estado" class="block text-sm font-medium text-gray-700">Estado</label>
                <select name="id_estado" id="id_estado" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" disabled>
                    @foreach ($estadosNicho as $estado)
                        <option value="{{ $estado->id }}" {{ $nicho->id_estado == $estado->id ? 'selected' : '' }}>
                            {{ $estado->nombre }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="flex justify-between">
                <a href="{{ route('nichos.index') }}" class="px-4 py-2 bg-gray-300 text-gray-800 rounded hover:bg-gray-400">← Cancelar</a>
                <x-primary-button>Actualizar</x-primary-button>
            </div>
        </form>
    </div>
</x-app-layout>
