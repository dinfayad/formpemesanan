<?php

namespace App\Http\Controllers;

use App\Models\TipeJilid;
use Illuminate\Http\Request;

class TipeJilidController extends Controller
{
    public function index()
    {
        return response()->json(TipeJilid::latest()->get());
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_jilid' => 'required|string|max:255',
            'biaya_a3'   => 'nullable|numeric|min:0',
            'tipe'       => 'nullable|in:Fix,Variable',
        ]);

        $item = TipeJilid::create($validated);
        return response()->json($item, 201);
    }

    public function show($id)
    {
        return response()->json(TipeJilid::findOrFail($id));
    }

    public function update(Request $request, $id)
    {
        $item = TipeJilid::findOrFail($id);

        $validated = $request->validate([
            'nama_jilid' => 'sometimes|required|string|max:255',
            'biaya_a3'   => 'nullable|numeric|min:0',
            'tipe'       => 'nullable|in:Fix,Variable',
        ]);

        $item->update($validated);
        return response()->json($item);
    }

    public function destroy($id)
    {
        TipeJilid::findOrFail($id)->delete();
        return response()->json(['message' => 'Berhasil dihapus']);
    }
}
