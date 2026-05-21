<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tipe_klik', function (Blueprint $table) {
            $table->id();
            $table->string('nama_klik');             // BW, FC, BW-FC
            $table->decimal('biaya_a3', 12, 2);      // Biaya A3
            $table->enum('tipe', ['Fix', 'Variable'])->default('Fix');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tipe_klik');
    }
};
