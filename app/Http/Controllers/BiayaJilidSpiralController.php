<?php

namespace App\Http\Controllers;

use App\Models\BiayaJilidSpiral;
use Illuminate\Http\Request;

class BiayaJilidSpiralController extends Controller
{
    public function index()
    {
        return response()->json(BiayaJilidSpiral::latest()->get());
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'bahan' => 'required|string|max:255',
            'biaya' => 'nullable|numeric|min:0',
        ]);

        $item = BiayaJilidSpiral::create($validated);
        return response()->json($item, 201);
    }

    public function show($id)
    {
        return response()->json(BiayaJilidSpiral::findOrFail($id));
    }

    public function update(Request $request, $id)
    {
        $item = BiayaJilidSpiral::findOrFail($id);

        $validated = $request->validate([
            'bahan' => 'sometimes|required|string|max:255',
            'biaya' => 'nullable|numeric|min:0',
        ]);

        $item->update($validated);
        return response()->json($item);
    }

    public function destroy($id)
    {
        BiayaJilidSpiral::findOrFail($id)->delete();
        return response()->json(['message' => 'Berhasil dihapus']);
    }
}
