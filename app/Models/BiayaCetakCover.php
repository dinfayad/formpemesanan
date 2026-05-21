<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BiayaCetakCover extends Model
{
    protected $table = 'biaya_cetak_cover';

    protected $fillable = [
        'nama_cetak',
        'biaya',
        'kode',
        'tipe',
    ];

    protected $casts = [
        'biaya' => 'decimal:2',
        'kode'  => 'integer',
    ];
}
