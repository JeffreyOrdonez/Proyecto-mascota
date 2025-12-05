<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Listado de Refugios (Diseño)') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    {{-- AQUÍ EMPIEZAS A DISEÑAR TU HTML --}}
                    <h3 class="text-lg font-bold mb-4">Refugios Disponibles</h3>

                    <div class="border p-4 rounded-lg mb-4">
                        <h4 class="text-xl text-blue-600">Refugio Patitas (Ejemplo)</h4>
                        <p>Dirección: Calle Falsa 123</p>
                        <button class="bg-blue-500 text-white px-4 py-2 rounded mt-2">Ver más</button>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
