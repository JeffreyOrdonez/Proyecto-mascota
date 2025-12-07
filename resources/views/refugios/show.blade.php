<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Detalles del Refugio') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <div class="mb-6">
                        <h3 class="text-2xl font-bold text-indigo-600 mb-2">{{ $refugio->nombre_refugio }}</h3>
                        <span class="bg-blue-100 text-blue-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-blue-200 dark:text-blue-800">
                            {{ $refugio->estado }}
                        </span>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <p class="font-bold text-gray-700 dark:text-gray-300">Descripción:</p>
                            <p class="mb-4">{{ $refugio->descripcion ?? 'Sin descripción' }}</p>

                            <p class="font-bold text-gray-700 dark:text-gray-300">Dirección:</p>
                            <p class="mb-4">{{ $refugio->direccion ?? 'Sin dirección' }}</p>
                        </div>

                        <div>
                            <p class="font-bold text-gray-700 dark:text-gray-300">Teléfono:</p>
                            <p class="mb-4">{{ $refugio->telefono_contacto ?? 'N/A' }}</p>

                            <p class="font-bold text-gray-700 dark:text-gray-300">Correo de Contacto:</p>
                            <p class="mb-4">{{ $refugio->correo_contacto ?? 'N/A' }}</p>
                        </div>
                    </div>

                    <div class="mt-8 border-t dark:border-gray-700 pt-6 flex flex-col md:flex-row justify-between items-center gap-4">
                        <a href="{{ route('web.refugios.index') }}" class=inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                            ← Volver a la lista
                        </a>

                        <div class="flex gap-2">
                            {{-- Botón Editar --}}
                            <a href="{{ route('refugios.edit', $refugio->id) }}" class="inline-flex items-center px-4 py-2 bg-yellow-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-yellow-600 focus:bg-yellow-600 active:bg-yellow-700 focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                Editar
                            </a>

                            {{-- Botón Eliminar --}}
                            <form action="{{ route('refugios.destroy', $refugio->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de eliminar este refugio?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-700 focus:bg-red-700 active:bg-red-800 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                    Eliminar
                                </button>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
