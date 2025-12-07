<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Editar Usuario') }}: {{ $usuario->nombre }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    {{-- Apuntamos a la ruta UPDATE y pasamos el ID --}}
                    <form method="POST" action="{{ route('usuarios.update', $usuario->id) }}">
                        @csrf
                        @method('PUT') {{-- 👈 ¡OBLIGATORIO PARA EDITAR! --}}

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                            <div>
                                <x-input-label for="nombre" :value="__('Nombre')" />
                                {{-- Usamos :value="$usuario->nombre" para pre-llenar el dato --}}
                                <x-text-input id="nombre" class="block mt-1 w-full" type="text" name="nombre" :value="old('nombre', $usuario->nombre)" required autofocus />
                                <x-input-error :messages="$errors->get('nombre')" class="mt-2" />
                            </div>

                            <div>
                                <x-input-label for="apellido" :value="__('Apellido')" />
                                <x-text-input id="apellido" class="block mt-1 w-full" type="text" name="apellido" :value="old('apellido', $usuario->apellido)" required />
                                <x-input-error :messages="$errors->get('apellido')" class="mt-2" />
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                            <div>
                                <x-input-label for="email" :value="__('Correo Electrónico')" />
                                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $usuario->email)" required />
                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                            </div>

                            <div>
                                <x-input-label for="telefono" :value="__('Teléfono')" />
                                <x-text-input id="telefono" class="block mt-1 w-full" type="text" name="telefono" :value="old('telefono', $usuario->telefono)" />
                                <x-input-error :messages="$errors->get('telefono')" class="mt-2" />
                            </div>
                        </div>

                        <div class="p-4 mb-4 bg-gray-50 dark:bg-gray-700 rounded-lg border border-gray-200 dark:border-gray-600">
                            <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100 mb-2">Cambiar Contraseña</h3>
                            <p class="text-sm text-gray-500 mb-4">Deja estos campos vacíos si no quieres cambiar la contraseña.</p>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <x-input-label for="password" :value="__('Nueva Contraseña (Opcional)')" />
                                    <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" autocomplete="new-password" />
                                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                </div>

                                <div>
                                    <x-input-label for="password_confirmation" :value="__('Confirmar Nueva Contraseña')" />
                                    <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" />
                                </div>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
                            <div>
                                <x-input-label for="role_id" :value="__('Rol de Usuario')" />
                                <select id="role_id" name="role_id" class="block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                                    {{-- Lógica para marcar como SELECTED el rol actual --}}
                                    <option value="1" {{ $usuario->role_id == 1 ? 'selected' : '' }}>Usuario Normal</option>
                                    <option value="2" {{ $usuario->role_id == 2 ? 'selected' : '' }}>Administrador / Refugio</option>
                                </select>
                            </div>

                            <div>
                                <x-input-label for="estado" :value="__('Estado')" />
                                <select id="estado" name="estado" class="block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                                    <option value="activo" {{ $usuario->estado == 'activo' ? 'selected' : '' }}>Activo</option>
                                    <option value="inactivo" {{ $usuario->estado == 'inactivo' ? 'selected' : '' }}>Inactivo</option>
                                </select>
                            </div>
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <a href="{{ route('usuarios.index') }}" class="text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 mr-4">
                                {{ __('Cancelar') }}
                            </a>

                            <x-primary-button class="ms-4 bg-green-600 hover:bg-green-700">
                                {{ __('Actualizar Usuario') }}
                            </x-primary-button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>

