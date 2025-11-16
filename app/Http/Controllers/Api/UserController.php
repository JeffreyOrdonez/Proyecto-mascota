<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\StoreUserRequest;
use Illuminate\Support\Facades\Hash;

use App\Http\Requests\UpdateUserRequest;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return response()->json($users);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        // 1. Obtenemos los datos validados (ej: nombre, apellido, email...)
        $data = $request->validated();

        // 2. Encriptamos la contraseña
        $data['password'] = Hash::make($data['password']);

        // 3. Creamos el usuario. Eloquent asignará todos los
        // campos de $data a tu modelo User gracias a tu array $fillable.
        $user = User::create($data);

        // 4. Devolvemos el usuario creado (tu $hidden array ocultará el password)
        return response()->json($user, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        //Obtener datos validos
        $data = $request->validated();

        //Si se cambia la contra, se encripta
        if (isset($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        }

        //Actualizar modelo
        $user->update($data);

        return response()->json($user);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();

        return response()->json(null, 204);
    }
}
