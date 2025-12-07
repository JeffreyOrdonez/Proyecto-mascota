<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Listado de Mascotas') }}
            </h2>
            <a href="{{ route('mascotas.create') }}" class="bg-indigo-600 hover:bg-indigo-800 text-white font-bold py-2 px-4 rounded">
                + Nueva Mascota
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <table class="min-w-full leading-normal">
                        <thead>
                            <tr>
                                <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Nombre</th>
                                <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Especie / Raza</th>
                                <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Refugio</th>
                                <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Estado</th>
                                <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($mascotas as $mascota)
                            <tr>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    <p class="text-gray-900 font-bold text-lg">{{ $mascota->nombre }}</p>
                                    <p class="text-gray-500 text-xs">{{ $mascota->edad }} años</p>
                                </td>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    <p class="text-gray-900">{{ $mascota->especie }}</p>
                                    <p class="text-gray-500 text-xs">{{ $mascota->raza }}</p>
                                </td>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    {{-- Usamos optional() por si se borró el refugio --}}
                                    <span class="text-indigo-600">{{ optional($mascota->refugio)->nombre_refugio ?? 'Sin Asignar' }}</span>
                                </td>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full
                                        {{ $mascota->estado == 'disponible' ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }}">
                                        {{ ucfirst($mascota->estado) }}
                                    </span>
                                </td>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    <a href="{{ route('mascotas.show', $mascota->id) }}" class="text-blue-600 hover:text-blue-900 font-bold">Ver Ficha</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    @if($mascotas->isEmpty())
                        <div class="text-center py-4 text-gray-500">No hay mascotas registradas aún.</div>
                    @endif

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
