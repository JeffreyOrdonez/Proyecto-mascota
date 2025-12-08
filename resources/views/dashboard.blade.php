<x-app-layout>
    <!-- ENCABEZADO -->
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
    </x-slot>

    <!-- CONTENIDO PRINCIPAL -->
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-10 text-gray-900">

                    <!-- TÍTULO DE BIENVENIDA -->
                    <h1 class="text-3xl font-bold text-gray-800 mb-4">
                        ¡Hola {{ Auth::user()->nombre }}! 👋
                    </h1>

                    <p class="text-gray-600 text-lg mb-6">
                        Bienvenido al sistema de gestión de <strong>Proyecto Mascota</strong>.  
                        Desde aquí puedes administrar refugios, mascotas y toda la plataforma.
                    </p>

                    <!-- TARJETAS DE ACCESO RÁPIDO -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                        <!-- TARJETA REFUGIOS -->
                        <a href="{{ route('web.refugios.index') }}"
                           class="block bg-indigo-50 hover:bg-indigo-100 border border-indigo-200 p-6 rounded-lg shadow transition">
                            <h3 class="text-xl font-semibold text-indigo-700 mb-2">🏠 Gestión de Refugios</h3>
                            <p class="text-gray-700">Consulta, registra, actualiza o elimina refugios aliados.</p>
                        </a>

                        <!-- TARJETA MASCOTAS -->
                        <a href="{{ route('mascotas.index') }}"
                           class="block bg-green-50 hover:bg-green-100 border border-green-200 p-6 rounded-lg shadow transition">
                            <h3 class="text-xl font-semibold text-green-700 mb-2">🐶 Gestión de Mascotas</h3>
                            <p class="text-gray-700">Administra mascotas disponibles para adopción.</p>
                        </a>

                    </div>

                </div>
            </div>

        </div>
    </div>
</x-app-layout>
