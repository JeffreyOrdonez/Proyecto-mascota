<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Refugios Aliados') }}
            </h2>
            <a href="{{ route('web.refugios.create') }}" class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded">
                + Nuevo Refugio
            </a>
        </div>

    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

                {{-- INICIO DEL CICLO: Por cada refugio en la BD... --}}
                @foreach ($refugios as $refugio)

                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        {{-- Nombre del Refugio (Dinámico) --}}
                        <h3 class="text-lg font-bold text-gray-900 dark:text-gray-100">
                            {{ $refugio->nombre_refugio }}
                        </h3>

                        {{-- Descripción (Dinámico) --}}
                        <p class="mt-2 text-gray-600 dark:text-gray-400">
                            {{ $refugio->descripcion ?? 'Sin descripción disponible.' }}
                        </p>

                        {{-- Estado (Dinámico) --}}
                        <p class="mt-2 text-sm text-gray-500">
                            Estado: <span class="font-semibold">{{ $refugio->estado }}</span>
                        </p>

                        <div class="mt-4 flex justify-end">
                            {{-- 👇 AQUÍ ESTÁ EL CAMBIO CLAVE 👇 --}}
                            <a href="{{ route('refugios.detalle', $refugio->id) }}" class="text-indigo-600 hover:text-indigo-900 font-medium">
                                Ver detalles →
                            </a>
                        </div>
                    </div>
                </div>

                @endforeach
                {{-- FIN DEL CICLO --}}

                {{-- Mensaje si no hay refugios --}}
                @if($refugios->isEmpty())
                <p class="text-gray-500 col-span-3 text-center">No hay refugios registrados aún.</p>
                @endif

            </div>

        </div>
    </div>
</x-app-layout>
