<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BiayaLainLain extends Model
{
    protected $table = 'biaya_lain_lain';

    protected $fillable = [
        'nama',
        'biaya',
        'tipe',
    ];

    protected $casts = [
        'biaya' => 'decimal:2',
    ];
}
