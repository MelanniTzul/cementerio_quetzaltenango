<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Editar Contrato
        </h2>
    </x-slot>

    <div class="py-8 max-w-4xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white shadow-md rounded p-6">
            <form action="{{ route('contratos.update', $contrato->id_contrato) }}" method="POST">
                @csrf
                @method('PUT')

                <x-input-label for="id_estado_contrato" value="Estado del Contrato" />
                <select name="id_estado_contrato" class="form-control mb-4">
                    @foreach($estados as $estado)
                        <option value="{{ $estado->id }}" {{ $contrato->id_estado_contrato == $estado->id ? 'selected' : '' }}>
                            {{ $estado->nombre }}
                        </option>
                    @endforeach
                </select>

                <x-input-label for="id_responsable" value="Responsable" />
                <select name="id_responsable" class="form-control mb-4">
                    @foreach($responsables as $r)
                        <option value="{{ $r->id }}" {{ $contrato->id_responsable == $r->id ? 'selected' : '' }}>
                            {{ $r->nombre }}
                        </option>
                    @endforeach
                </select>

                <x-input-label for="id_nicho" value="Nicho" />
                <select name="id_nicho" class="form-control mb-4">
                    @foreach($nichos as $n)
                        <option value="{{ $n->id_nicho }}" {{ $contrato->id_nicho == $n->id_nicho ? 'selected' : '' }}>
                            {{ $n->descripcion }}
                        </option>
                    @endforeach
                </select>

                <x-input-label for="id_ocupante" value="Ocupante" />
                <select name="id_ocupante" class="form-control mb-4">
                    @foreach($ocupantes as $o)
                        <option value="{{ $o->id_ocupante }}" {{ $contrato->id_ocupante == $o->id_ocupante ? 'selected' : '' }}>
                            {{ $o->nombre }}
                        </option>
                    @endforeach
                </select>

                <x-input-label for="fecha_inicio" value="Fecha de Inicio" />
                <x-text-input type="date" name="fecha_inicio" class="form-control mb-4" value="{{ $contrato->fecha_inicio }}" />

                <x-input-label for="fecha_fin" value="Fecha de Fin" />
                <x-text-input type="date" name="fecha_fin" class="form-control mb-4" value="{{ $contrato->fecha_fin }}" />

                <x-input-label for="monto" value="Monto" />
                <x-text-input type="number" step="0.01" name="monto" class="form-control mb-4" value="{{ $contrato->monto }}" />

                <x-primary-button>Actualizar Contrato</x-primary-button>
            </form>
        </div>
    </div>
</x-app-layout>
