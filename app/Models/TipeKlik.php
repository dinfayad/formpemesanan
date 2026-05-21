<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipeKlik extends Model
{
    protected $table = 'tipe_klik';

    protected $fillable = [
        'nama_klik',
        'biaya_a3',
        'tipe',
    ];

    protected $casts = [
        'biaya_a3' => 'decimal:2',
    ];
}
