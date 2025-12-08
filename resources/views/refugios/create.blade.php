<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Registrar Nuevo Refugio') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <form method="POST" action="{{ route('web.refugios.store') }}">
                        @csrf

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                            <div>
                                <x-input-label for="nombre_refugio" :value="__('Nombre del Refugio')" />
                                <x-text-input id="nombre_refugio" class="block mt-1 w-full"
                                              type="text" name="nombre_refugio" required autofocus />
                            </div>

                            <div>
                                <x-input-label for="estado" :value="__('Estado')" />
                                <select name="estado" class="block mt-1 w-full border-gray-300 rounded-md">
                                    <option value="activo">Activo</option>
                                    <option value="inactivo">Inactivo</option>
                                </select>
                            </div>
                        </div>

                        <div class="mb-4">
                            <x-input-label for="direccion" :value="__('Dirección')" />
                            <x-text-input id="direccion" class="block mt-1 w-full"
                                          type="text" name="direccion" required />
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                            <div>
                                <x-input-label for="telefono_contacto" :value="__('Teléfono')" />
                                <x-text-input id="telefono_contacto" class="block mt-1 w-full"
                                              type="text" name="telefono_contacto" />
                            </div>

                            <div>
                                <x-input-label for="correo_contacto" :value="__('Correo Electrónico')" />
                                <x-text-input id="correo_contacto" class="block mt-1 w-full"
                                              type="email" name="correo_contacto" />
                            </div>
                        </div>

                        <div class="mb-6">
                            <x-input-label for="descripcion" :value="__('Descripción')" />
                            <textarea name="descripcion" rows="3"
                                      class="block mt-1 w-full border-gray-300 rounded-md"></textarea>
                        </div>

                        <div class="flex justify-end">
                            <a href="{{ route('web.refugios.index') }}"
                               class="text-gray-500 mr-4 mt-2 hover:text-gray-700">Cancelar</a>

                            <x-primary-button>{{ __('Guardar Refugio') }}</x-primary-button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
