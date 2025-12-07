<?php

namespace App\Http\Controllers;

use App\Models\Mascota;
use App\Models\Refugio;
use Illuminate\Http\Request;

class MascotaController extends Controller
{
    public function index()
    {
        $mascotas = Mascota::with('refugio')->get();
        return view('mascotas.index', compact('mascotas'));
    }

    public function create()
    {
        $refugios = Refugio::all();
        return view('mascotas.create', compact('refugios'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'especie' => 'required',
            'refugio_id' => 'required|exists:refugios,id',
        ]);

        Mascota::create($request->all());

        return redirect()->route('mascotas.index')->with('success', 'Mascota creada correctamente.');
    }

    public function show($id)
    {
        $mascota = Mascota::with('refugio')->findOrFail($id);
        return view('mascotas.show', compact('mascota'));
    }

    public function edit($id)
    {
        $mascota = Mascota::findOrFail($id);
        $refugios = Refugio::all();

        return view('mascotas.edit', compact('mascota', 'refugios'));
    }

    public function update(Request $request, $id)
    {
        $mascota = Mascota::findOrFail($id);
        $mascota->update($request->all());

        return redirect()->route('mascotas.index')->with('success', 'Mascota actualizada correctamente.');
    }

    public function destroy($id)
    {
        Mascota::findOrFail($id)->delete();
        return redirect()->route('mascotas.index')->with('success', 'Mascota eliminada.');
    }
}
