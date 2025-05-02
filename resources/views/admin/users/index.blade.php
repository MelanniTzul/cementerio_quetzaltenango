<x-app-layout>
    <div class="container mx-auto py-6 px-4">
        <div class="flex items-center justify-between mb-6">
            <h1 class="text-3xl font-bold text-gray-800">Gestión de Roles de Usuario</h1>
        </div>

        @if(session('success'))
        <div class="mb-4 text-green-700 bg-green-100 border border-green-300 rounded-md px-4 py-2 text-center">
            {{ session('success') }}
        </div>
        @endif

        <div class="overflow-x-auto">
            <table class=" bg-white border border-gray-300 rounded-lg shadow-md min-w-[900px] text-base text-left">
                <thead class="bg-gray-800 text-white text-sm uppercase">
                    <tr>
                        <th class="py-3 px-6">Nombre</th>
                        <th class="py-3 px-6">Correo</th>
                        <th class="py-3 px-6">Rol Actual</th>
                        <th class="py-3 px-6">Cambiar Rol</th>
                    </tr>
                </thead>
                <tbody class="bg-white text-gray-800 divide-y divide-gray-200">
                    @foreach($users as $user)
                    <tr class="hover:bg-gray-50">
                        <td class="py-3 px-6">{{ $user->nombre }}</td>
                        <td class="py-3 px-6">{{ $user->correo }}</td>
                        <td class="py-3 px-6">{{ $user->rol->nombre ?? 'Sin rol' }}</td>
                        <td class="py-3 px-6">
                            <form method="POST" action="{{ route('admin.changeRole', $user->id) }}"
                                onsubmit="return confirm('¿Estás segura de que deseas cambiar el rol de este usuario?');">
                                @csrf
                                @method('PUT')
                                <div class="flex items-center gap-3">
                                    <select name="id_rol"
                                        class="w-50 border border-gray-300 rounded-md shadow-sm text-sm  py-2 focus:ring-indigo-500 focus:border-indigo-500">
                                        @foreach($roles as $rol)
                                        <option value="{{ $rol->id }}" {{ $user->id_rol == $rol->id ? 'selected' : '' }}>
                                            {{ $rol->nombre }}
                                        </option>
                                        @endforeach
                                    </select>
                                    <x-primary-button>
                                        Actualizar
                                    </x-primary-button>

                                </div>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
