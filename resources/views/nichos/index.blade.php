<x-app-layout>
    <div class="container mx-auto py-6 px-4">
        <div class="flex items-center justify-between mb-6">
            <h1 class="text-3xl font-bold text-gray-800">Listado de Nichos</h1>
            <a href="{{ route('nichos.create') }}">
                <x-primary-button>
                    + Crear Nicho
                </x-primary-button>
            </a>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full bg-white border border-gray-300 rounded-lg shadow-md">
                <thead class="bg-gray-800 text-white text-sm uppercase">
                    <tr>
                        <th class="py-3 px-6 text-left">Código</th>
                        <th class="py-3 px-6 text-left">Tipo</th>
                        <th class="py-3 px-6 text-left">Calle</th>
                        <th class="py-3 px-6 text-left">Avenida</th>
                        <th class="py-3 px-6 text-left">Estado</th>
                        <th class="py-3 px-6 text-left">Acciones</th> <!-- Nueva columna -->
                    </tr>
                </thead>
                <tbody class="text-gray-700">
                    @foreach ($nichos as $nicho)
                    <tr class="border-t hover:bg-gray-100 transition">
                        <td class="py-3 px-6">{{ $nicho->codigo }}</td>
                        <td class="py-3 px-6">{{ $nicho->tipo->nombre }}</td>
                        <td class="py-3 px-6">{{ $nicho->calle->nombre }}</td>
                        <td class="py-3 px-6">{{ $nicho->avenida->nombre }}</td>
                        <td class="py-3 px-6">{{ $nicho->estado->nombre }}</td>
                        <td class="py-3 px-6">
                            <a href="{{ route('nichos.edit', $nicho->id) }}"
                               class="text-blue-600 hover:text-blue-800 font-semibold">
                                ✏️ Editar
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
