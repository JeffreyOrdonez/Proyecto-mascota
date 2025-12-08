<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Perfil de Mascota') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">

                    <div class="flex flex-col md:flex-row gap-6">
                        <div class="w-full md:w-1/3 text-center">
                            {{-- CORRECCIÓN AQUÍ: Agregamos y --}}
                            <div class="bg-gray-200 h-48 w-full rounded-lg flex items-center justify-center text-gray-400 mb-4 font-bold border-2 border-dashed border-gray-300">
                                <span>[ Foto de la Mascota ]</span>
                            </div>

                            <span class="px-4 py-2 rounded-full text-sm font-bold block w-full
                                {{ $mascota->estado == 'disponible' ? 'bg-green-100 text-green-800' : 'bg-blue-100 text-blue-800' }}">
                                {{ strtoupper($mascota->estado) }}
                            </span>
                        </div>

                        <div class="w-full md:w-2/3">
                            {{-- Títulos en blanco para modo oscuro --}}
                            <h1 class="text-3xl font-bold text-gray-900 mb-2">{{ $mascota->nombre }}</h1>
                            <p class="text-gray-500 text-lg mb-4 font-medium">{{ $mascota->raza }} • {{ $mascota->edad }} años</p>

                            {{-- Caja de descripción con mejor contraste --}}
                            <div class="bg-gray-50 p-4 rounded-lg mb-4 border border-gray-200">
                                <h3 class="font-bold text-gray-700 mb-2">Sobre mí:</h3>
                                <p class="text-gray-600 leading-relaxed">
                                    {{ $mascota->descripcion ?? 'No hay descripción disponible para esta mascota.' }}
                                </p>
                            </div>

                            {{-- Detalles técnicos --}}
                            <div class="grid grid-cols-2 gap-4 text-sm mt-6">
                                <div class="p-3 bg-gray-50 rounded border">
                                    <p class="font-bold text-gray-500 uppercase text-xs">Refugio</p>
                                    <p class="text-indigo-600 font-bold text-lg">
                                        {{ optional($mascota->refugio)->nombre_refugio ?? 'No asignado' }}
                                    </p>
                                </div>
                                <div class="p-3 bg-gray-50 rounded border">
                                    <p class="font-bold text-gray-500 uppercase text-xs">Especie</p>
                                    <p class="text-gray-800 font-bold text-lg">{{ $mascota->especie }}</p>
                                </div>
                            </div>

                            <div class="mt-8 border-t pt-4">
                                <a href="{{ route('mascotas.index') }}" class="inline-flex items-center text-indigo-600 hover:text-indigo-800 font-medium transition-colors duration-150">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                                    Volver al listado
                                </a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
