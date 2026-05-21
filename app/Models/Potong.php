<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Potong extends Model
{
    protected $table = 'potong';

    protected $fillable = [
        'variabel',
        'ukuran',
        'satuan',
        'biaya',
    ];

    protected $casts = [
        'ukuran' => 'decimal:4',
        'biaya'  => 'decimal:2',
    ];
}
