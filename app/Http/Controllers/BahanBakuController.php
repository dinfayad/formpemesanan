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
            'jenis' => $request->jenis,
            'ukuran' => $request->ukuran,
            'merk' => $request->merk,
            'supplier' => $request->supplier,
            'update_terakhir' => $request->update_terakhir,
            'harga_beli' => $request->harga_beli,
            'keterangan' => $request->keterangan,
        ]);

        return redirect('/bahan-baku/create')
            ->with('success', 'Data bahan baku berhasil disimpan');
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
public function edit($id)
{
    $item = BahanBaku::findOrFail($id);

    return view('bahan_baku.edit', compact('item'));
}

public function update(Request $request, $id)
{
    $item = BahanBaku::findOrFail($id);

    $item->update_terakhir = $request->update_terakhir;
    $item->harga_beli      = $request->harga_beli;
    $item->keterangan      = $request->keterangan;

    $item->save();

    return redirect('/bahan-baku/list')
        ->with('success', 'Data berhasil diupdate');
}
}