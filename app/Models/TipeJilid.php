<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipeJilid extends Model
{
    protected $table = 'tipe_jilid';

    protected $fillable = [
        'nama_jilid',
        'biaya_a3',
        'tipe',
    ];

    protected $casts = [
        'biaya_a3' => 'decimal:2',
    ];
}
