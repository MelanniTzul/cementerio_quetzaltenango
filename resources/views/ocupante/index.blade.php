<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
                Listado de Ocupantes
            </h2>
            <a href="{{ route('ocupantes.create') }}"
                class="bg-gray-800 text-white px-4 py-2 rounded-md hover:bg-gray-900 transition">
                + Crear Ocupante
            </a>
        </div>
    </x-slot>

    <div class="py-10 max-w-full mx-auto sm:px-6 lg:px-8 ">
        <div class="bg-white shadow-md rounded-lg overflow-x-auto w-full">
            <table class="w-full min-w-[1300px] text-base text-left">
                <thead class="bg-gray-800 text-white uppercase text-sm">
                    <tr>
                        <th class="px-8 py-4">Nombre</th>
                        <th class="px-8 py-4">Apellido</th>
                        <th class="px-8 py-4">DPI</th>
                        <th class="px-8 py-4">Municipio</th>
                        <th class="px-8 py-4">Fallecimiento</th>
                        <th class="px-8 py-4">Causa de Muerte</th>
                        <th class="px-8 py-4">Género</th>
                        <th class="px-8 py-4">Nicho</th>
                        <th class="px-8 py-4">Histórico</th>
                        <th class="px-8 py-4">Acciones</th>
                    </tr>
                </thead>
                <tbody class="bg-white text-gray-800 divide-y divide-gray-200">
                    @foreach ($ocupantes as $ocupante)
                        <tr class="hover:bg-gray-50">
                            <td class="px-8 py-4">{{ $ocupante->nombre }}</td>
                            <td class="px-8 py-4">{{ $ocupante->apellido }}</td>
                            <td class="px-8 py-4">{{ $ocupante->dpi }}</td>
                            <td class="px-8 py-4">{{ $ocupante->municipio->nombre ?? 'N/A' }}</td>
                            <td class="px-8 py-4">{{ $ocupante->fecha_fallecimiento }}</td>
                            <td class="px-8 py-4">{{ $ocupante->causa_muerte ?? 'N/A' }}</td>
                            <td class="px-8 py-4">{{ $ocupante->genero->nombre ?? 'N/A' }}</td>
                            <td class="px-8 py-4">{{ $ocupante->nicho->codigo ?? 'N/A' }}</td>
                            <td class="px-8 py-4">
                                {{ $ocupante->personaje_historico ? 'Sí' : 'No' }}
                            </td>
                            <td class="px-8 py-4 space-y-1">
                                <a href="{{ route('ocupantes.edit', $ocupante->id) }}"
                                    class="text-yellow-600 hover:text-yellow-800 inline-flex items-center">
                                    ✏️ <span class="ml-1">Editar</span>
                                </a>
                                <form action="{{ route('ocupantes.destroy', $ocupante->id) }}" method="POST"
                                    onsubmit="return confirm('¿Estás seguro de que deseas eliminar este ocupante?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="text-red-600 hover:text-red-800 inline-flex items-center">
                                        🗑 <span class="ml-1">Eliminar</span>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
