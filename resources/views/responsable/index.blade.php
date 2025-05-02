<x-app-layout>
    <div class="container mx-auto py-6 px-4">
        <div class="flex items-center justify-between mb-6">
            <h1 class="text-3xl font-bold text-gray-800">Listado de Responsables</h1>
            <a href="{{ route('responsables.create') }}">
                <x-primary-button>+ Crear Responsable</x-primary-button>
            </a>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full bg-white border border-gray-300 rounded-lg shadow-md min-w-[1000px] text-base text-left">
                <thead class="bg-gray-800 text-white text-sm uppercase">
                    <tr>
                        <th class="py-3 px-6">Nombre</th>
                        <th class="py-3 px-6">DPI</th>
                        <th class="py-3 px-6">Teléfono</th>
                        <th class="py-3 px-6">Dirección</th>
                        <th class="py-3 px-6">Correo</th>
                        <th class="py-3 px-6">Municipio</th>
                        <th class="py-3 px-6">Acciones</th>
                    </tr>
                </thead>
                <tbody class="bg-white text-gray-800 divide-y divide-gray-200">
                    @foreach ($responsables as $responsable)
                        <tr class="hover:bg-gray-50">
                            <td class="py-3 px-6">{{ $responsable->nombre }} {{ $responsable->apellido }}</td>
                            <td class="py-3 px-6">{{ $responsable->dpi }}</td>
                            <td class="py-3 px-6">{{ $responsable->telefono }}</td>
                            <td class="py-3 px-6">{{ $responsable->direccion }}</td>
                            <td class="py-3 px-6">{{ $responsable->correo }}</td>
                            <td class="py-3 px-6">{{ $responsable->municipio->nombre ?? 'N/A' }}</td>
                            <td class="py-3 px-6 space-y-1">
                                <a href="{{ route('responsables.edit', $responsable->id) }}"
                                    class="text-yellow-600 hover:text-yellow-800 font-semibold">✏️ Editar</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
