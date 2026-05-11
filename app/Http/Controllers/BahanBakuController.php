<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BahanBaku;

class BahanBakuController extends Controller
{
    public function create()
    {
        return view('admin.bahan_baku_create');
    }

    public function store(Request $request)
    {
        BahanBaku::create([
            'nama_bahan' => $request->nama_bahan,
            'merk' => $request->merk,
            'supplier' => $request->supplier,
            'update_terakhir' => $request->update_terakhir,
            'harga_beli' => $request->harga_beli,
            'keterangan' => $request->keterangan,
        ]);

        return redirect('/bahan-baku/list');
    }

    public function list()
    {
        $data = BahanBaku::all();

        return view('admin.bahan_baku_list', compact('data'));
    }

    public function delete($id)
{
    BahanBaku::findOrFail($id)->delete();

    return redirect('/bahan-baku/list');
}
}