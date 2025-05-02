<x-app-layout>
    <div class="container mx-auto py-6 px-4">
        <h1 class="text-2xl font-bold mb-4 text-gray-800">Registrar Nuevo Nicho</h1>

        <form method="POST" action="{{ route('nichos.store') }}">
            @csrf

            <div class="mb-4">
                <label for="codigo" class="block text-sm font-medium text-gray-700">Código</label>
                <input type="text" placeholder="ADU-A-3-001" name="codigo" id="codigo" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
            </div>

            <div class="mb-4">
                <label for="id_tipo" class="block text-sm font-medium text-gray-700">Tipo de Nicho</label>
                <select name="id_tipo" id="id_tipo" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                    @foreach($tipoNicho as $tipo)
                        <option value="{{ $tipo->id }}">{{ $tipo->nombre }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label for="id_calle" class="block text-sm font-medium text-gray-700">Calle</label>
                <select name="id_calle" id="id_calle" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                    @foreach($calles as $calle)
                        <option value="{{ $calle->id }}">{{ $calle->nombre }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label for="id_avenida" class="block text-sm font-medium text-gray-700">Avenida</label>
                <select name="id_avenida" id="id_avenida" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                    @foreach($avenidas as $avenida)
                        <option value="{{ $avenida->id }}">{{ $avenida->nombre }}</option>
                    @endforeach
                </select>
            </div>


            <div class="flex justify-end">
                 <a href="{{ route('nichos.index') }}"
                    class="inline-block px-4 py-2 bg-gray-300 text-gray-800 rounded-md hover:bg-gray-400">
                    ← Regresar
                </a>
                <x-primary-button type="" class=" px-4 py-2 rounded-md hover:bg-blue-700">
                    Guardar Nicho
                </x-primary-button>
            </div>
        </form>
    </div>
</x-app-layout>
