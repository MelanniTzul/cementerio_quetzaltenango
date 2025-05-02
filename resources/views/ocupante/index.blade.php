<x-app-layout>
    <div class="container mx-auto py-6 px-4">
        <div class="flex items-center justify-between mb-6">
            <h1 class="text-3xl font-bold text-gray-800">Listado de Ocupantes</h1>
            <a href="{{ route('ocupantes.create') }}">
                <x-primary-button>
                    + Crear Ocupante
                </x-primary-button>
            </a>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full bg-white border border-gray-300 rounded-lg shadow-md min-w-[1300px] text-base text-left">
                <thead class="bg-gray-800 text-white uppercase text-sm">
                    <tr>
                        <th class="py-3 px-6">Nombre</th>
                        <th class="py-3 px-6">Apellido</th>
                        <th class="py-3 px-6">DPI</th>
                        <th class="py-3 px-6">Municipio</th>
                        <th class="py-3 px-6">Fallecimiento</th>
                        <th class="py-3 px-6">Causa de Muerte</th>
                        <th class="py-3 px-6">Género</th>
                        <th class="py-3 px-6">Nicho</th>
                        <th class="py-3 px-6">Histórico</th>
                        <th class="py-3 px-6">Acciones</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700">
                    @foreach ($ocupantes as $ocupante)
                        <tr class="border-t hover:bg-gray-100 transition">
                            <td class="py-3 px-6">{{ $ocupante->nombre }}</td>
                            <td class="py-3 px-6">{{ $ocupante->apellido }}</td>
                            <td class="py-3 px-6">{{ $ocupante->dpi }}</td>
                            <td class="py-3 px-6">{{ $ocupante->municipio->nombre ?? 'N/A' }}</td>
                            <td class="py-3 px-6">{{ $ocupante->fecha_fallecimiento }}</td>
                            <td class="py-3 px-6">{{ $ocupante->causa_muerte ?? 'N/A' }}</td>
                            <td class="py-3 px-6">{{ $ocupante->genero->nombre ?? 'N/A' }}</td>
                            <td class="py-3 px-6">{{ $ocupante->nicho->codigo ?? 'N/A' }}</td>
                            <td class="py-3 px-6">{{ $ocupante->personaje_historico ? 'Sí' : 'No' }}</td>
                            <td class="py-3 px-6 space-y-1">
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
