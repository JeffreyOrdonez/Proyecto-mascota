<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Editar Refugio') }}: {{ $refugio->nombre_refugio }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <form method="POST" action="{{ route('refugios.update', $refugio->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                            <div>
                                <x-input-label for="nombre_refugio" :value="__('Nombre del Refugio')" />
                                <x-text-input id="nombre_refugio" class="block mt-1 w-full" type="text" name="nombre_refugio" :value="$refugio->nombre_refugio" required />
                            </div>

                            <div>
                                <x-input-label for="estado" :value="__('Estado')" />
                                <select name="estado" class="block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                                    <option value="activo" {{ $refugio->estado == 'activo' ? 'selected' : '' }}>Activo</option>
                                    <option value="inactivo" {{ $refugio->estado == 'inactivo' ? 'selected' : '' }}>Inactivo</option>
                                </select>
                            </div>
                        </div>

                        <div class="mb-4">
                            <x-input-label for="direccion" :value="__('Dirección')" />
                            <x-text-input id="direccion" class="block mt-1 w-full" type="text" name="direccion" :value="$refugio->direccion" required />
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                            <div>
                                <x-input-label for="telefono_contacto" :value="__('Teléfono')" />
                                <x-text-input id="telefono_contacto" class="block mt-1 w-full" type="text" name="telefono_contacto" :value="$refugio->telefono_contacto" />
                            </div>
                            <div>
                                <x-input-label for="correo_contacto" :value="__('Correo Electrónico')" />
                                <x-text-input id="correo_contacto" class="block mt-1 w-full" type="email" name="correo_contacto" :value="$refugio->correo_contacto" />
                            </div>
                        </div>

                        <div class="mb-6">
                            <x-input-label for="descripcion" :value="__('Descripción')" />
                            <textarea name="descripcion" rows="3" class="block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">{{ $refugio->descripcion }}</textarea>
                        </div>

                        <div class="flex justify-end">
                            <a href="{{ route('refugios.detalle', $refugio->id) }}" class="text-gray-500 dark:text-gray-400 mr-4 mt-2 hover:text-gray-700">Cancelar</a>
                            <x-primary-button>{{ __('Actualizar Refugio') }}</x-primary-button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
