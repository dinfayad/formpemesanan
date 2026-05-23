<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('daftar_konsumen', function (Blueprint $table) {
            $table->id();
            $table->string('instansi');              // IPB Press, Konsumen Luar, BLST/IPB
            $table->enum('tipe', ['Fix', 'Variable'])->default('Fix');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('daftar_konsumen');
    }
};
