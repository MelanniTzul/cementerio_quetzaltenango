<x-app-layout>
    <div class="container mx-auto py-6 px-4">
        <div class="flex items-center justify-between mb-6">
            <h1 class="text-3xl font-bold text-gray-800">Listado de Exhumaciones</h1>
            <a href="{{ route('exhumacion.create') }}">
                <x-primary-button>+ Registrar Exhumación</x-primary-button>
            </a>
        </div>

        @if(session('success'))
        <div class="mb-4 text-green-700 bg-green-100 border border-green-300 rounded-md px-4 py-2 text-center">
            {{ session('success') }}
        </div>
        @endif

        <div class="overflow-x-auto">
            <table class="w-full bg-white border border-gray-300 rounded-lg shadow-md min-w-[1000px] text-base text-left">
                <thead class="bg-gray-800 text-white text-sm uppercase">
                    <tr>
                        <th class="px-6 py-3">Solicitante</th>
                        <th class="px-6 py-3">Ocupante</th>
                        <th class="px-6 py-3">Nicho</th>
                        <th class="px-6 py-3">Fecha Solicitud exhumación</th>
                        <th class="px-6 py-3">Motivo</th>
                        <th class="px-6 py-3">Acciones</th>
                    </tr>
                </thead>
                <tbody class="bg-white text-gray-800 divide-y divide-gray-200">
                    @foreach ($exhumaciones as $exhumacion)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4">{{ $exhumacion->solicitante }}</td>
                            <td class="px-6 py-4">
                                {{ $exhumacion->ocupante->nombre ?? '---' }} {{ $exhumacion->ocupante->apellido ?? '' }}
                            </td>
                            <td class="px-6 py-4">{{ $exhumacion->ocupante->nicho->codigo ?? '---' }}</td> {{-- Aquí se muestra el nicho --}}
                            <td class="px-6 py-4">{{ $exhumacion->fecha_solicitud }}</td>
                            <td class="px-6 py-4">{{ $exhumacion->motivo }}</td>
                            <td class="px-6 py-4 space-x-2 flex">
                                <a href="{{ route('exhumacion.edit', $exhumacion->id) }}"
                                   class="text-yellow-600 hover:text-yellow-800 inline-flex items-center">
                                    ✏️ <span class="ml-1">Editar</span>
                                </a>
                                <form action="{{ route('exhumacion.destroy', $exhumacion->id) }}"
                                      method="POST" onsubmit="return confirm('¿Estás seguro de que deseas eliminar esta exhumación?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-800 inline-flex items-center">
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
