<x-app-layout>
    <div class="container mx-auto py-6 px-4">
        <div class="flex items-center justify-between mb-6">
            <h1 class="text-3xl font-bold text-gray-800">Listado de Contratos</h1>
            <a href="{{ route('contratos.create') }}">
                <x-primary-button>
                    + Crear Contrato
                </x-primary-button>
            </a>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full bg-white border border-gray-300 rounded-lg shadow-md">
                <thead class="bg-gray-800 text-white text-sm uppercase">
                    <tr>
                        <th class="py-3 px-6 text-left">Nicho</th>
                        <th class="py-3 px-6 text-left">Responsable</th>
                        <th class="py-3 px-6 text-left">Estado</th>
                        <th class="py-3 px-6 text-left">Inicio</th>
                        <th class="py-3 px-6 text-left">Fin</th>
                        <th class="py-3 px-6 text-left">Acciones</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700">
                    @foreach ($contratos as $contrato)
                        <tr class="border-t hover:bg-gray-100 transition">
                            <td class="py-3 px-6">{{ $contrato->nicho->codigo ?? 'N/A' }}</td>
                            <td class="py-3 px-6">{{ $contrato->responsable->nombre ?? 'N/A' }} {{ $contrato->responsable->apellido ?? '' }}</td>
                            <td class="py-3 px-6">{{ $contrato->estado->nombre ?? 'N/A' }}</td>
                            <td class="py-3 px-6">{{ $contrato->fecha_inicio }}</td>
                            <td class="py-3 px-6">{{ $contrato->fecha_fin ?? '---' }}</td>
                            <td class="py-3 px-6">
                                <a href="{{ route('contratos.edit', $contrato->id) }}"
                                   class="text-yellow-600 hover:text-yellow-800 font-semibold inline-flex items-center">
                                   ✏️ <span class="ml-1">Editar</span>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
