<?php

namespace App\Http\Controllers;

use App\Models\JenisLaminating;
use Illuminate\Http\Request;

class JenisLaminatingController extends Controller
{
    public function index()
    {
        return response()->json(JenisLaminating::latest()->get());
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_laminating' => 'required|string|max:255',
            'biaya'           => 'nullable|numeric|min:0',
            'tipe'            => 'nullable|in:Fix,Variable',
        ]);

        $item = JenisLaminating::create($validated);
        return response()->json($item, 201);
    }

    public function show($id)
    {
        return response()->json(JenisLaminating::findOrFail($id));
    }

    public function update(Request $request, $id)
    {
        $item = JenisLaminating::findOrFail($id);

        $validated = $request->validate([
            'nama_laminating' => 'sometimes|required|string|max:255',
            'biaya'           => 'nullable|numeric|min:0',
            'tipe'            => 'nullable|in:Fix,Variable',
        ]);

        $item->update($validated);
        return response()->json($item);
    }

    public function destroy($id)
    {
        JenisLaminating::findOrFail($id)->delete();
        return response()->json(['message' => 'Berhasil dihapus']);
    }
}
