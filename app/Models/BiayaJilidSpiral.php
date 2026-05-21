<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BiayaJilidSpiral extends Model
{
    protected $table = 'biaya_jilid_spiral';

    protected $fillable = [
        'bahan',
        'biaya',
    ];

    protected $casts = [
        'biaya' => 'decimal:2',
    ];
}
