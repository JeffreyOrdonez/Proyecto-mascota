<?php

namespace App\Http\Controllers;

use App\Models\Refugio;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\StoreRefugioRequest;

class RefugioController extends Controller
{
    public function index()
    {

        $refugios = Refugio::all();

        return view('refugios.index', ['refugios' => $refugios]);
    }

    public function store(StoreRefugioRequest $request) // 2. ¡Cámbialo aquí también!
    {
        // 3. La validación también es automática aquí.
        Refugio::create($request->validated());

        // 4. ¡LA DIFERENCIA CLAVE!
        // Un formulario web no devuelve JSON, redirige al usuario.
        // Por ejemplo, lo rediriges de vuelta al listado de refugios
        // con un mensaje de éxito.

        return redirect()->route('refugios.index') // Asumiendo que tienes una ruta llamada 'refugios.index'
            ->with('success', '¡Refugio creado con éxito!');
    }

    public function show($id)
    {
        $refugio = Refugio::find($id);

        if (!$refugio) {
            return response()->json(['error' => 'Refugio no encontrado'], 404);
        }

        // NOTA: Esto devuelve JSON (texto), no tu diseño bonito.
        return response()->json($refugio);
    }

    public function update(Request $request, Refugio $refugio): JsonResponse
    {
        $data = $request->validate([
            'nombre_refugio'    => ['sometimes', 'required', 'string', 'max:150'],
            'descripcion'       => ['nullable', 'string'],
            'direccion'         => ['sometimes', 'required', 'string'],
            'telefono_contacto' => ['nullable', 'string', 'max:30'],
            'correo_contacto'   => ['nullable', 'email', 'max:150'],
            'estado'            => ['in:activo,inactivo'],
        ]);

        $refugio->update($data);
        return response()->json($refugio);
    }

    public function destroy(Refugio $refugio): JsonResponse
    {
        $refugio->delete();
        return response()->json(null, 204);
    }
}
