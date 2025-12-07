<?php

namespace App\Http\Controllers;

use App\Models\Refugio;
use Illuminate\Http\Request;

class RefugioWebController extends Controller
{
    public function index()
    {
        $refugios = Refugio::all();
        return view('refugios.index', compact('refugios'));
    }

    public function create()
    {
        return view('refugios.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre_refugio' => 'required',
        ]);

        Refugio::create([
            'user_id' => auth()->id(),
            'nombre_refugio' => $request->nombre_refugio,
            'descripcion' => $request->descripcion,
            'direccion' => $request->direccion,
            'telefono_contacto' => $request->telefono_contacto,
            'correo_contacto' => $request->correo_contacto,
            'estado' => $request->estado,
        ]);

        return redirect()->route('web.refugios.index')->with('success', 'Refugio creado correctamente.');
    }

    public function show($id)
    {
        $refugio = Refugio::findOrFail($id);
        return view('refugios.show', compact('refugio'));
    }

    public function edit($id)
    {
        $refugio = Refugio::findOrFail($id);
        return view('refugios.edit', compact('refugio'));
    }

    public function update(Request $request, $id)
    {
        $refugio = Refugio::findOrFail($id);
        $refugio->update($request->all());

        return redirect()->route('refugios.detalle', $id)->with('success', 'Refugio actualizado correctamente.');
    }

    public function destroy($id)
    {
        Refugio::findOrFail($id)->delete();

        return redirect()->route('web.refugios.index')->with('success', 'Refugio eliminado.');
    }
}
