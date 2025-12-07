<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

use App\Models\Refugio;
use Illuminate\Http\Request;
use App\Http\Requests\StoreRefugioRequest;

class RefugioController extends Controller
{
    public function index()
    {

        $refugios = Refugio::all();

        return response()->json($refugios);
    }

    public function store(StoreRefugioRequest $request)
    {
        // Vamos a envolver todo en un "try...catch"
        // para capturar cualquier error silencioso de la base de datos.
        try {
            // 1. Obtenemos los datos que ya validaste (esto está bien)
            $data = $request->validated();

            // 2. Creamos una NUEVA instancia del modelo (aún no en BD)
            $refugio = new Refugio();

            // 3. Asignamos los valores uno por uno
            $refugio->user_id = $data['user_id'];
            $refugio->nombre_refugio = $data['nombre_refugio'];
            $refugio->direccion = $data['direccion'];
            $refugio->estado = $data['estado'];

            // Asignamos los opcionales (nullable)
            $refugio->descripcion = $data['descripcion'] ?? null;
            $refugio->telefono_contacto = $data['telefono_contacto'] ?? null;
            $refugio->correo_contacto = $data['correo_contacto'] ?? null;

            // 4. ¡EL PASO CLAVE!
            // Aquí es donde intentamos guardar en la BD real.
            // Si esto falla, el 'catch' lo atrapará.
            $refugio->saveOrFail();

            // 5. Si llegamos aquí, ¡realmente se guardó!
            // $refugio ahora tendrá el ID de la BD.
            return response()->json($refugio, 201);
        } catch (\Exception $e) {

            // 6. ¡SI ALGO FALLÓ, LO CAPTURAMOS!
            // En lugar de un 201 falso, ahora te daremos un 500
            // con el mensaje de error REAL.
            return response()->json([
                'error' => '¡ERROR! Falló al guardar en la base de datos.',
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function destroy($id)
    {
        $refugio = Refugio::find($id);
        if (!$refugio) {
            return response()->json(['error' => 'Refugio not found'], 404);
        }
        $refugio->delete();
        return response()->json(['message' => 'Refugio deleted']);
    }

    /**
     * Muestra un refugio específico.
     */
    public function show($id)
    {
        $refugio = Refugio::find($id);

        if (!$refugio) {
            return response()->json(['error' => 'Refugio no encontrado'], 404);
        }

        // NOTA: Si usas esto para la WEB, deberías cambiar
        // la siguiente línea por: return view('refugios.show', compact('refugio'));
        return response()->json($refugio);
    }
}
