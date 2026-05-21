<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BiayaJilidLem extends Model
{
    protected $table = 'biaya_jilid_lem';

    protected $fillable = [
        'bahan',
        'biaya',
    ];

    protected $casts = [
        'biaya' => 'decimal:2',
    ];
}
