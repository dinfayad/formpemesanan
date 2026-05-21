<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DaftarKonsumen extends Model
{
    protected $table = 'daftar_konsumen';

    protected $fillable = [
        'no',
        'instansi',
        'tipe',
    ];

    protected $casts = [
        'no' => 'integer',
    ];
}
