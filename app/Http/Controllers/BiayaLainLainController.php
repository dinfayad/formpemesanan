<?php

namespace App\Http\Controllers;

use App\Models\BiayaLainLain;
use Illuminate\Http\Request;

class BiayaLainLainController extends Controller
{
    public function index()
    {
        return response()->json(BiayaLainLain::latest()->get());
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama'  => 'required|string|max:255',
            'biaya' => 'nullable|numeric|min:0',
            'tipe'  => 'nullable|in:Fix,Variable',
        ]);

        $item = BiayaLainLain::create($validated);
        return response()->json($item, 201);
    }

    public function show($id)
    {
        return response()->json(BiayaLainLain::findOrFail($id));
    }

    public function update(Request $request, $id)
    {
        $item = BiayaLainLain::findOrFail($id);

        $validated = $request->validate([
            'nama'  => 'sometimes|required|string|max:255',
            'biaya' => 'nullable|numeric|min:0',
            'tipe'  => 'nullable|in:Fix,Variable',
        ]);

        $item->update($validated);
        return response()->json($item);
    }

    public function destroy($id)
    {
        BiayaLainLain::findOrFail($id)->delete();
        return response()->json(['message' => 'Berhasil dihapus']);
    }
}
