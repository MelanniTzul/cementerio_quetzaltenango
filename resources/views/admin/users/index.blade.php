<x-app-layout>
    <div class="container mx-auto my-10 px-4 ">
        <h1 class="text-3xl font-bold text-center text-gray-800 mb-6">Gestión de Roles de Usuario</h1>

        @if(session('success'))
        <div class="mb-4 text-green-700 bg-green-100 border border-green-300 rounded-md px-4 py-2 text-center">
            {{ session('success') }}
        </div>
        @endif

        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200 rounded-lg shadow-sm">
                <thead class="bg-gray-800  text-white">
                    <tr>
                        <th class="px-6 py-3 text-sm font-semibold text-left">Nombre</th>
                        <th class="px-6 py-3 text-sm font-semibold text-left">Correo</th>
                        <th class="px-6 py-3 text-sm font-semibold text-left">Rol Actual</th>
                        <th class="px-6 py-3 text-sm font-semibold text-left"></th>
                        <th class="px-6 py-3 text-sm font-semibold text-left">Cambiar Rol</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-100">
                    @foreach($users as $user)
                    <tr>
                        <td class="px-6 py-4 text-sm text-gray-800">{{ $user->nombre }}</td>
                        <td class="px-6 py-4 text-sm text-gray-800">{{ $user->correo }}</td>
                        <td class="px-6 py-4 text-sm text-gray-800">{{ $user->rol->nombre ?? 'Sin rol' }}</td>
                        <td class="px-6 py-4">
                        <td class="px-6 py-4">
                            <form method="POST" action="{{ route('admin.changeRole', $user->id) }}" onsubmit="return confirm('¿Estás segura de que deseas cambiar el rol de este usuario?');">
                                @csrf
                                @method('PUT')
                                <div class="flex flex-wrap items-center gap-2">
                                    <select name="id_rol"
                                        class="w-44 border border-gray-300 rounded-md shadow-sm text-sm px-6 py-2 focus:ring-indigo-500 focus:border-indigo-500">
                                        @foreach($roles as $rol)
                                        <option value="{{ $rol->id }}" {{ $user->id_rol == $rol->id ? 'selected' : '' }}>
                                            {{ $rol-> nombre  }}
                                        </option>
                                        @endforeach
                                    </select>

                                    <button type="submit"
                                        class="px-4 py-2 bg-green-600 text-white font-semibold text-sm rounded-md shadow-md hover:bg-green-700 transition duration-150">
                                        ✅
                                    </button>

                                </div>
                            </form>
                        </td>

                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
