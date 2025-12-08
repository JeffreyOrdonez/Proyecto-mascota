<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Mascota') }}: {{ $mascota->nombre }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <form method="POST" action="{{ route('mascotas.update', $mascota->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                            {{-- Nombre --}}
                            <div>
                                <x-input-label for="nombre" :value="__('Nombre de la Mascota')" />
                                <x-text-input 
                                    id="nombre" 
                                    class="block mt-1 w-full" 
                                    type="text" 
                                    name="nombre" 
                                    :value="old('nombre', $mascota->nombre)" 
                                    required 
                                />
                                <x-input-error :messages="$errors->get('nombre')" class="mt-2" />
                            </div>
                            {{-- Sexo --}}
                            <div class="mb-4">
                                <x-input-label for="sexo" :value="__('Sexo')" />
                                <select name="sexo" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                                    <option value="Macho" {{ $mascota->sexo == 'Macho' ? 'selected' : '' }}>Macho</option>
                                    <option value="Hembra" {{ $mascota->sexo == 'Hembra' ? 'selected' : '' }}>Hembra</option>
                                </select>
                                <x-input-error :messages="$errors->get('sexo')" class="mt-2" />
                            </div>
                            {{-- Edad --}}
                            <div>
                                <x-input-label for="edad" :value="__('Edad (Años)')" />
                                <x-text-input 
                                    id="edad" 
                                    class="block mt-1 w-full" 
                                    type="number" 
                                    name="edad" 
                                    min="0"
                                    :value="old('edad', $mascota->edad)" 
                                />
                                <x-input-error :messages="$errors->get('edad')" class="mt-2" />
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                            {{-- Especie --}}
                            <div>
                                <x-input-label for="especie" :value="__('Especie')" />
                                <select 
                                    name="especie" 
                                    class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                                >
                                    <option value="Perro" {{ $mascota->especie == 'Perro' ? 'selected' : '' }}>Perro</option>
                                    <option value="Gato" {{ $mascota->especie == 'Gato' ? 'selected' : '' }}>Gato</option>
                                    <option value="Otro" {{ $mascota->especie == 'Otro' ? 'selected' : '' }}>Otro</option>
                                </select>
                                <x-input-error :messages="$errors->get('especie')" class="mt-2" />
                            </div>

                            {{-- Raza --}}
                            <div>
                                <x-input-label for="raza" :value="__('Raza')" />
                                <x-text-input 
                                    id="raza" 
                                    class="block mt-1 w-full" 
                                    type="text" 
                                    name="raza" 
                                    :value="old('raza', $mascota->raza)" 
                                />
                                <x-input-error :messages="$errors->get('raza')" class="mt-2" />
                            </div>
                        </div>

                        {{-- Refugio --}}
                        <div class="mb-4">
                            <x-input-label for="refugio_id" :value="__('Refugio Responsable')" />
                            <select 
                                name="refugio_id" 
                                class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                                required
                            >
                                @foreach($refugios as $refugio)
                                    <option 
                                        value="{{ $refugio->id }}"
                                        {{ $mascota->refugio_id == $refugio->id ? 'selected' : '' }}
                                    >
                                        {{ $refugio->nombre_refugio }}
                                    </option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('refugio_id')" class="mt-2" />
                        </div>

                        {{-- Estado --}}
                        <div class="mb-4">
                            <x-input-label for="estado" :value="__('Estado Actual')" />
                            <select 
                                name="estado" 
                                class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                            >
                                <option value="disponible" {{ $mascota->estado == 'disponible' ? 'selected' : '' }}>Disponible para Adopción</option>
                                <option value="pendiente" {{ $mascota->estado == 'pendiente' ? 'selected' : '' }}>En Proceso</option>
                                <option value="adoptado" {{ $mascota->estado == 'adoptado' ? 'selected' : '' }}>Adoptado</option>
                            </select>
                            <x-input-error :messages="$errors->get('estado')" class="mt-2" />
                        </div>

                        {{-- Descripción --}}
                        <div class="mb-6">
                            <x-input-label for="descripcion" :value="__('Descripción / Historia')" />
                            <textarea 
                                name="descripcion"
                                rows="3"
                                class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                            >{{ old('descripcion', $mascota->descripcion) }}</textarea>
                            <x-input-error :messages="$errors->get('descripcion')" class="mt-2" />
                        </div>
                        
                        <div class="flex justify-end">
                            <a href="{{ route('mascotas.index') }}" class="text-gray-500 mr-4 mt-2 hover:text-gray-700">
                                Cancelar
                            </a>

                            <x-primary-button class="bg-green-600 hover:bg-green-700">
                                {{ __('Actualizar Mascota') }}
                            </x-primary-button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
