<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JenisLaminating extends Model
{
    protected $table = 'jenis_laminating';

    protected $fillable = [
        'nama_laminating',
        'biaya',
        'tipe',
    ];

    protected $casts = [
        'biaya' => 'decimal:2',
    ];
}
