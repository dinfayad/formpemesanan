<?php

namespace App\Http\Controllers;

use App\Models\DaftarKonsumen;
use Illuminate\Http\Request;

class DaftarKonsumenController extends Controller
{
    public function index()
    {
        return response()->json(DaftarKonsumen::all());
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'instansi' => 'nullable|string|max:255',
            'tipe'     => 'nullable|in:Fix,Variable',
        ]);

        $item = DaftarKonsumen::create($validated);
        return response()->json($item, 201);
    }

    public function show($id)
    {
        return response()->json(DaftarKonsumen::findOrFail($id));
    }

    public function update(Request $request, $id)
    {
        $item = DaftarKonsumen::findOrFail($id);

        $validated = $request->validate([
            'no'       => 'sometimes|required|integer',
            'instansi' => 'nullable|string|max:255',
            'tipe'     => 'nullable|in:Fix,Variable',
        ]);

        $item->update($validated);
        return response()->json($item);
    }

    public function destroy($id)
    {
        DaftarKonsumen::findOrFail($id)->delete();
        return response()->json(['message' => 'Berhasil dihapus']);
    }
}
