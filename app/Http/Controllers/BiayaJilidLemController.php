<?php

namespace App\Http\Controllers;

use App\Models\BiayaJilidLem;
use Illuminate\Http\Request;

class BiayaJilidLemController extends Controller
{
    public function index()
    {
        return response()->json(BiayaJilidLem::latest()->get());
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'bahan' => 'required|string|max:255',
            'biaya' => 'nullable|numeric|min:0',
        ]);

        $item = BiayaJilidLem::create($validated);
        return response()->json($item, 201);
    }

    public function show($id)
    {
        return response()->json(BiayaJilidLem::findOrFail($id));
    }

    public function update(Request $request, $id)
    {
        $item = BiayaJilidLem::findOrFail($id);

        $validated = $request->validate([
            'bahan' => 'sometimes|required|string|max:255',
            'biaya' => 'nullable|numeric|min:0',
        ]);

        $item->update($validated);
        return response()->json($item);
    }

    public function destroy($id)
    {
        BiayaJilidLem::findOrFail($id)->delete();
        return response()->json(['message' => 'Berhasil dihapus']);
    }
}
