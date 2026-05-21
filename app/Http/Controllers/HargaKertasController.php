<?php

namespace App\Http\Controllers;

use App\Models\HargaKertas;
use Illuminate\Http\Request;

class HargaKertasController extends Controller
{
    public function index()
    {
        $data = HargaKertas::latest()->get();
        return response()->json($data);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_kertas' => 'required|string|max:255',
            'biaya'       => 'nullable|numeric|min:0',
            'atribut'     => 'nullable|numeric|min:0',
        ]);

        $item = HargaKertas::create($validated);
        return response()->json($item, 201);
    }

    public function show($id)
    {
        return response()->json(HargaKertas::findOrFail($id));
    }

    public function update(Request $request, $id)
    {
        $item = HargaKertas::findOrFail($id);

        $validated = $request->validate([
            'nama_kertas' => 'sometimes|required|string|max:255',
            'biaya'       => 'nullable|numeric|min:0',
            'atribut'     => 'nullable|numeric|min:0',
        ]);

        $item->update($validated);
        return response()->json($item);
    }

    public function destroy($id)
    {
        HargaKertas::findOrFail($id)->delete();
        return response()->json(['message' => 'Berhasil dihapus']);
    }
}
