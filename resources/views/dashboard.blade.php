<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    Bienvenido, {{ Auth::user()->nombre }}
                </h2>
                <p class="text-sm text-gray-500">
                    Rol: <span class="font-medium">{{ Auth::user()->rol->id === 1 ? 'Administrador' : (Auth::user()->rol->nombre ?? 'Sin rol asignado') }}</span>
                </p>
            </div>
            <div>
                <span class="text-gray-600 font-bold text-lg">Sistema Cementerio</span>
            </div>
        </div>
    </x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 text-gray-800">

                <h3 class="text-2xl font-bold mb-6">Menu</h3>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    <a href="#" class="bg-blue-100 hover:bg-blue-200 transition p-5 rounded shadow text-center">
                        <h4 class="font-bold text-lg">Gestión de Nichos</h4>
                        <p class="text-sm text-gray-600">Consulta, agrega o modifica los nichos disponibles.</p>
                    </a>

                    <a href="#" class="bg-blue-100 hover:bg-blue-200 transition p-5 rounded shadow text-center">
                        <h4 class="font-bold text-lg">Contratos</h4>
                        <p class="text-sm text-gray-600">Administra los contratos activos y vencidos.</p>
                    </a>

                    <a href="#" class="bg-blue-100 hover:bg-blue-200 transition p-5 rounded shadow text-center">
                        <h4 class="font-bold text-lg">Reportes</h4>
                        <p class="text-sm text-gray-600">Visualiza reportes por fecha, usuario o tipo.</p>
                    </a>

                    @if (Auth::user()->rol->id === 1)
                        <a href="{{ route('admin.user-roles.index') }}" class="bg-blue-100 hover:bg-blue-200 transition p-5 rounded shadow text-center">
                            <h4 class="font-bold text-lg">Gestión de Roles</h4>
                            <p class="text-sm text-gray-600">Visualiza y cambia roles de los usuarios.</p>
                        </a>
                    @endif
                </div>

                <div class="mt-10 text-center text-gray-500 italic">
                    "Honrando la memoria, facilitando el presente."
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
