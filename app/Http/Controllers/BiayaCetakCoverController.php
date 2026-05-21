<?php

namespace App\Http\Controllers;

use App\Models\BiayaCetakCover;
use Illuminate\Http\Request;

class BiayaCetakCoverController extends Controller
{
    public function index()
    {
        return response()->json(BiayaCetakCover::latest()->get());
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_cetak' => 'required|string|max:255',
            'biaya'      => 'nullable|numeric|min:0',
            'kode'       => 'nullable|integer',
            'tipe'       => 'nullable|in:Fix,Variable',
        ]);

        $item = BiayaCetakCover::create($validated);
        return response()->json($item, 201);
    }

    public function show($id)
    {
        return response()->json(BiayaCetakCover::findOrFail($id));
    }

    public function update(Request $request, $id)
    {
        $item = BiayaCetakCover::findOrFail($id);

        $validated = $request->validate([
            'nama_cetak' => 'sometimes|required|string|max:255',
            'biaya'      => 'nullable|numeric|min:0',
            'kode'       => 'nullable|integer',
            'tipe'       => 'nullable|in:Fix,Variable',
        ]);

        $item->update($validated);
        return response()->json($item);
    }

    public function destroy($id)
    {
        BiayaCetakCover::findOrFail($id)->delete();
        return response()->json(['message' => 'Berhasil dihapus']);
    }
}
