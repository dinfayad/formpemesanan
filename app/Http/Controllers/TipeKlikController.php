<?php

namespace App\Http\Controllers;

use App\Models\TipeKlik;
use Illuminate\Http\Request;

class TipeKlikController extends Controller
{
    public function index()
    {
        return response()->json(TipeKlik::latest()->get());
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_klik' => 'required|string|max:255',
            'biaya_a3'  => 'nullable|numeric|min:0',
            'tipe'      => 'nullable|in:Fix,Variable',
        ]);

        $item = TipeKlik::create($validated);
        return response()->json($item, 201);
    }

    public function show($id)
    {
        return response()->json(TipeKlik::findOrFail($id));
    }

    public function update(Request $request, $id)
    {
        $item = TipeKlik::findOrFail($id);

        $validated = $request->validate([
            'nama_klik' => 'sometimes|required|string|max:255',
            'biaya_a3'  => 'nullable|numeric|min:0',
            'tipe'      => 'nullable|in:Fix,Variable',
        ]);

        $item->update($validated);
        return response()->json($item);
    }

    public function destroy($id)
    {
        TipeKlik::findOrFail($id)->delete();
        return response()->json(['message' => 'Berhasil dihapus']);
    }
}
