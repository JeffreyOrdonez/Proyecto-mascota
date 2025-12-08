<x-app-layout>
    <x-slot name="header">
            <div class="flex justify-between items-center w-full">

                {{-- Título Izquierdo --}}
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    🐾 Gestión de Refugios
                </h2>

                {{-- MENÚ SUPERIOR --}}
                <nav class="flex gap-6 text-lg">

                    <a href="{{ route('dashboard') }}"
                    class="text-indigo-600 hover:text-indigo-800 font-semibold">
                        Inicio
                    </a>

                    <a href="{{ route('mascotas.index') }}"
                    class="text-indigo-600 hover:text-indigo-800 font-semibold">
                        Mascotas
                    </a>

                </nav>

                {{-- Título Central --}}
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Listado de Refugios') }}
                </h2>

                {{-- Botón Nuevo --}}
                <a href="{{ route('web.refugios.create') }}" 
                class="bg-indigo-600 hover:bg-indigo-800 text-white font-bold py-2 px-4 rounded">
                    + Nuevo Refugio
                </a>

            </div>
        </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

                @foreach ($refugios as $refugio)
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6">

                            <h3 class="text-lg font-bold text-gray-900">
                                {{ $refugio->nombre_refugio }}
                            </h3>

                            <p class="mt-2 text-gray-600">
                                {{ $refugio->descripcion ?? 'Sin descripción disponible.' }}
                            </p>

                            <p class="mt-2 text-sm text-gray-500">
                                Estado:
                                <span class="font-semibold">{{ $refugio->estado }}</span>
                            </p>

                            <div class="mt-4 flex justify-end">
                                <a href="{{ route('web.refugios.detalle', $refugio->id) }}"
                                   class="text-indigo-600 hover:text-indigo-900 font-medium">
                                    Ver detalles →
                                </a>
                            </div>

                        </div>
                    </div>
                @endforeach

                @if ($refugios->isEmpty())
                    <p class="text-gray-500 col-span-3 text-center">No hay refugios registrados aún.</p>
                @endif

            </div>

        </div>
    </div>
</x-app-layout>
