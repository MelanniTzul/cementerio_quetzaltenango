<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
                Listado de Contratos
            </h2>
            <a href="{{ route('contratos.create') }}"
               class="bg-gray-800 text-white px-4 py-2 rounded hover:bg-gray-900 transition">
                + Crear Contrato
            </a>
        </div>
    </x-slot>

    <div class="py-10 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white shadow overflow-hidden sm:rounded-lg">
            <table class="min-w-full text-sm text-left">
                <thead class="bg-gray-800 text-white uppercase text-xs">
                    <tr>
                        <th class="px-6 py-3">Nicho</th>
                        <th class="px-6 py-3">Responsable</th>
                        <th class="px-6 py-3">Estado</th>
                        <th class="px-6 py-3">Inicio</th>
                        <th class="px-6 py-3">Fin</th>
                        <th class="px-6 py-3">Acciones</th>
                    </tr>
                </thead>
                <tbody class="bg-white text-gray-700 divide-y divide-gray-200">
                    @foreach ($contratos as $contrato)
                        <tr class="hover:bg-gray-100">
                            <td class="px-6 py-4">{{ $contrato->nicho->codigo ?? 'N/A' }}</td>
                            <td class="px-6 py-4">{{ $contrato->responsable->nombre ?? 'N/A' }}</td>
                            <td class="px-6 py-4">{{ $contrato->estado->nombre ?? 'N/A' }}</td>
                            <td class="px-6 py-4">{{ $contrato->fecha_inicio }}</td>
                            <td class="px-6 py-4">{{ $contrato->fecha_fin ?? '---' }}</td>
                            <td class="px-6 py-4">
                                <a href="{{ route('contratos.edit', $contrato->id) }}"
                                   class="inline-flex items-center text-yellow-600 hover:text-yellow-800">
                                    🖉 <span class="ml-1">Editar</span>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
