<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Models\Refugio;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Mascota;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// 👇 RUTAS TEMPORALES DE DISEÑO (Bórralas cuando tu amigo suba el backend)
Route::middleware(['auth'])->group(function () {

    Route::get('/diseño/refugios', function () {
        // 1. Buscamos todos los refugios en la BD
        $refugios = Refugio::all();

        // 2. Se los enviamos a la vista
        return view('refugios.index', compact('refugios'));
    })->name('web.refugios.index');


    // 2. CREAR (FORMULARIO)
    Route::get('/diseño/refugios/crear', function () {
        return view('refugios.create');
    })->name('web.refugios.create');

    // 3. GUARDAR (STORE)
    Route::post('/diseño/refugios', function (Request $request) {
        $validated = $request->validate([
            'nombre_refugio' => 'required|string|max:255',
            'direccion' => 'required|string',
            'descripcion' => 'nullable|string',
            'telefono_contacto' => 'nullable|string',
            'correo_contacto' => 'nullable|email',
            'estado' => 'required|in:activo,inactivo',
        ]);

        // Asignamos el usuario actual como dueño del refugio
        $validated['user_id'] = auth()->id();

        Refugio::create($validated);

        return redirect()->route('refugios.index')->with('success', 'Refugio creado correctamente');
    })->name('web.refugios.store');

    // 4. VER DETALLE (SHOW)
    Route::get('/diseño/refugios/{id}', function ($id) {
        $refugio = Refugio::findOrFail($id);
        return view('refugios.show', compact('refugio'));
    })->name('web.refugios.detalle');

    // 5. EDITAR (FORMULARIO)
    Route::get('/diseño/refugios/{id}/editar', function ($id) {
        $refugio = Refugio::findOrFail($id);
        return view('refugios.edit', compact('refugio'));
    })->name('refugios.edit');

    // 6. ACTUALIZAR (UPDATE)
    Route::put('/diseño/refugios/{id}', function (Request $request, $id) {
        $refugio = Refugio::findOrFail($id);

        $validated = $request->validate([
            'nombre_refugio' => 'required|string|max:255',
            'direccion' => 'required|string',
            'descripcion' => 'nullable|string',
            'telefono_contacto' => 'nullable|string',
            'correo_contacto' => 'nullable|email',
            'estado' => 'required|in:activo,inactivo',
        ]);

        $refugio->update($validated);

        return redirect()->route('refugios.detalle', $id);
    })->name('refugios.update');

    // 7. BORRAR (DESTROY)
    Route::delete('/diseño/refugios/{id}', function ($id) {
        Refugio::findOrFail($id)->delete();
        return redirect()->route('refugios.index');
    })->name('refugios.destroy');

    // Ruta para ver tu diseño de Crear Mascota
    Route::view('/diseño/mascotas/crear', 'mascotas.index')->name('mascotas.ver');

    // Ruta para ver UN solo refugio (Show)
    Route::get('/diseño/refugios/{id}', function ($id) {
        // Buscamos el refugio por ID, si no existe da error 404
        $refugio = Refugio::findOrFail($id);

        return view('refugios.show', compact('refugio'));
    })->name('refugios.detalle');

    // 1. LISTAR
    Route::get('/diseño/usuarios', function () {
        $usuarios = User::all();
        return view('usuarios.index', compact('usuarios'));
    })->name('usuarios.index');

    // 2. MOSTRAR FORMULARIO CREAR
    Route::get('/diseño/usuarios/crear', function () {
        return view('usuarios.create');
    })->name('usuarios.create');

    // 3. GUARDAR (POST)
    Route::post('/diseño/usuarios', function (Request $request) {
        // Validar y crear (usando lógica parecida a tu API)
        // ... aquí iría el código de guardado ...
        return redirect()->route('usuarios.index');
    })->name('usuarios.store');

    // 4. MOSTRAR FORMULARIO EDITAR
    Route::get('/diseño/usuarios/{id}/editar', function ($id) {
        $usuario = User::findOrFail($id);
        return view('usuarios.edit', compact('usuario'));
    })->name('usuarios.edit');

    // 5. ACTUALIZAR (PUT)
    Route::put('/diseño/usuarios/{id}', function (Request $request, $id) {
        // ... lógica de actualizar ...
        return redirect()->route('usuarios.index');
    })->name('usuarios.update');

    // 6. BORRAR (DELETE)
    Route::delete('/diseño/usuarios/{id}', function ($id) {
        User::findOrFail($id)->delete();
        return redirect()->route('usuarios.index');
    })->name('usuarios.destroy');

    // Ruta para GUARDAR el usuario (recibe el formulario)
    Route::post('/diseño/usuarios', function (Illuminate\Http\Request $request) {

        // 1. Validar
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'email' => 'required|email|unique:usuarios,email',
            'password' => 'required|confirmed|min:8',
            'role_id' => 'required|integer',
            'estado' => 'required|in:activo,inactivo',
            'telefono' => 'nullable|string',
        ]);

        // 2. Crear (Recuerda encriptar la contraseña)
        $validated['password'] = Illuminate\Support\Facades\Hash::make($validated['password']);

        App\Models\User::create($validated);

        // 3. Redirigir
        return redirect()->route('usuarios.index');
    })->name('usuarios.store');

    // Ruta para PROCESAR LA ACTUALIZACIÓN (PUT)
    Route::put('/diseño/usuarios/{id}', function (Illuminate\Http\Request $request, $id) {

        $usuario = App\Models\User::findOrFail($id);

        // 1. Validar
        $validated = $request->validate([
            'nombre'   => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'telefono' => 'nullable|string',
            'role_id'  => 'required|integer',
            'estado'   => 'required|in:activo,inactivo',

            // TRUCO: Validar email único PERO ignorando al usuario actual (para que no de error si no cambia su email)
            'email'    => 'required|email|unique:usuarios,email,'.$usuario->id,

            // Password es 'nullable' (opcional)
            'password' => 'nullable|confirmed|min:8',
        ]);

        // 2. Lógica de Contraseña
        if (!empty($request->password)) {
            // Si escribió algo, lo encriptamos y guardamos
            $validated['password'] = Illuminate\Support\Facades\Hash::make($request->password);
        } else {
            // Si lo dejó vacío, quitamos 'password' del array para NO sobrescribirla
            unset($validated['password']);
        }

        // 3. Actualizar
        $usuario->update($validated);

        return redirect()->route('usuarios.index');

    })->name('usuarios.update');
});

    // 1. LISTAR MASCOTAS (INDEX)
    Route::get('/diseño/mascotas', function () {
        // Traemos las mascotas con la información de su refugio
        $mascotas = Mascota::with('refugio')->get();
        return view('mascotas.index', compact('mascotas'));
    })->name('mascotas.index');

    // 2. FORMULARIO DE CREAR (CREATE)
    Route::get('/diseño/mascotas/crear', function () {
        // Necesitamos la lista de refugios para el <select>
        $refugios = Refugio::all();
        return view('mascotas.create', compact('refugios'));
    })->name('mascotas.create');

    // 3. GUARDAR MASCOTA (STORE)
    Route::post('/diseño/mascotas', function (Request $request) {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'especie' => 'required|string',
            'raza' => 'nullable|string',
            'edad' => 'nullable|integer',
            'descripcion' => 'nullable|string',
            'refugio_id' => 'required|exists:refugios,id', // Debe existir en la tabla refugios
            'estado' => 'required|in:disponible,adoptado,pendiente',
        ]);

        Mascota::create($validated);

        return redirect()->route('mascotas.index')->with('success', 'Mascota registrada correctamente');
    })->name('mascotas.store');

    // 4. VER DETALLE (SHOW)
    Route::get('/diseño/mascotas/{id}', function ($id) {
        $mascota = Mascota::with('refugio')->findOrFail($id);
        return view('mascotas.show', compact('mascota'));
    })->name('mascotas.show');

require __DIR__ . '/auth.php';
