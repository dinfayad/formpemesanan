<?php

namespace App\Http\Controllers;

use App\Models\Potong;
use Illuminate\Http\Request;

class PotongController extends Controller
{
    public function index()
    {
        return response()->json(Potong::latest()->get());
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'variabel' => 'required|string|max:255',
            'ukuran'   => 'nullable|numeric',
            'satuan'   => 'nullable|string|max:20',
            'biaya'    => 'nullable|numeric|min:0',
        ]);

        $item = Potong::create($validated);
        return response()->json($item, 201);
    }

    public function show($id)
    {
        return response()->json(Potong::findOrFail($id));
    }

    public function update(Request $request, $id)
    {
        $item = Potong::findOrFail($id);

        $validated = $request->validate([
            'variabel' => 'sometimes|required|string|max:255',
            'ukuran'   => 'nullable|numeric',
            'satuan'   => 'nullable|string|max:20',
            'biaya'    => 'nullable|numeric|min:0',
        ]);

        $item->update($validated);
        return response()->json($item);
    }

    public function destroy($id)
    {
        Potong::findOrFail($id)->delete();
        return response()->json(['message' => 'Berhasil dihapus']);
    }
}
