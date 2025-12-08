<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                🐾 Bienvenido a Proyecto Mascota
            </h2>

            <!-- MENÚ SUPERIOR -->
            <nav class="flex gap-4">
                <a href="{{ route('web.refugios.index') }}"
                   class="text-indigo-600 hover:text-indigo-800 font-semibold">
                    Refugios
                </a>

                <a href="{{ route('mascotas.index') }}"
                   class="text-indigo-600 hover:text-indigo-800 font-semibold">
                    Mascotas
                </a>
            </nav>
        </div>
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Gestión de Usuarios') }}
            </h2>
            <a href="{{ route('usuarios.create') }}" class="bg-blue-600 hover:bg-blue-800 text-white font-bold py-2 px-4 rounded">
                + Crear Usuario
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <table class="min-w-full leading-normal">
                        <thead>
                            <tr>
                                <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Nombre Completo</th>
                                <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Contacto</th>
                                <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Rol</th>
                                <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Estado</th>
                                <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($usuarios as $usuario)
                            <tr>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    <p class="text-gray-900 font-bold">{{ $usuario->nombre }} {{ $usuario->apellido }}</p>
                                </td>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    <p class="text-gray-900">{{ $usuario->email }}</p>
                                    <p class="text-gray-500 text-xs">{{ $usuario->telefono }}</p>
                                </td>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    <p class="text-gray-900">{{ $usuario->role_id }}</p>
                                    {{-- Luego podemos hacer que muestre el nombre del rol --}}
                                </td>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    <span class="relative inline-block px-3 py-1 font-semibold {{ $usuario->estado == 'activo' ? 'text-green-900' : 'text-red-900' }} leading-tight">
                                        <span aria-hidden class="absolute inset-0 {{ $usuario->estado == 'activo' ? 'bg-green-200' : 'bg-red-200' }} opacity-50 rounded-full"></span>
                                        <span class="relative">{{ ucfirst($usuario->estado) }}</span>
                                    </span>
                                </td>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    <a href="{{ route('usuarios.edit', $usuario->id) }}" class="text-blue-600 hover:text-blue-900 mr-3">Editar</a>

                                    {{-- Formulario para borrar --}}
                                    <form action="{{ route('usuarios.destroy', $usuario->id) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-900" onclick="return confirm('¿Estás seguro?')">Borrar</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
