<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HargaKertas extends Model
{
    protected $table = 'harga_kertas';

    protected $fillable = [
        'nama_kertas',
        'biaya',
        'atribut',
    ];

    protected $casts = [
        'biaya'   => 'decimal:2',
        'atribut' => 'decimal:2',
    ];
}
