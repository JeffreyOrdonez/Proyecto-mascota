<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detalles del Refugio') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white shadow-sm sm:rounded-lg p-6">

                <h3 class="text-2xl font-bold text-indigo-600">
                    {{ $refugio->nombre_refugio }}
                </h3>

                <span class="bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded">
                    {{ $refugio->estado }}
                </span>

                <div class="mt-6 grid grid-cols-1 md:grid-cols-2 gap-6">

                    <div>
                        <p class="font-bold">Descripción:</p>
                        <p>{{ $refugio->descripcion ?? 'Sin descripción' }}</p>

                        <p class="font-bold mt-4">Dirección:</p>
                        <p>{{ $refugio->direccion }}</p>
                    </div>

                    <div>
                        <p class="font-bold">Teléfono:</p>
                        <p>{{ $refugio->telefono_contacto ?? 'N/A' }}</p>

                        <p class="font-bold mt-4">Correo de Contacto:</p>
                        <p>{{ $refugio->correo_contacto ?? 'N/A' }}</p>
                    </div>

                </div>

                <div class="mt-8 flex justify-between items-center">

                    <a href="{{ route('web.refugios.index') }}"
                       class="px-4 py-2 bg-gray-800 text-white text-xs font-semibold rounded">
                        ← Volver a la lista
                    </a>

                    <div class="flex gap-2">

                        <a href="{{ route('web.refugios.edit', $refugio->id) }}"
                           class="px-4 py-2 bg-yellow-500 text-white text-xs rounded">
                            Editar
                        </a>

                        <form action="{{ route('web.refugios.destroy', $refugio->id) }}"
                              method="POST"
                              onsubmit="return confirm('¿Estás seguro?')">
                            @csrf
                            @method('DELETE')
                            <button class="px-4 py-2 bg-red-600 text-white text-xs rounded">
                                Eliminar
                            </button>
                        </form>

                    </div>

                </div>

            </div>

        </div>
    </div>
</x-app-layout>
