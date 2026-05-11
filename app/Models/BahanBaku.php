<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BahanBaku extends Model
{
    protected $fillable = [
        'nama_bahan',
        'merk',
        'update_terakhir',
        'harga_beli',
        'keterangan'
    ];
}