<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('biaya_cetak_cover', function (Blueprint $table) {
            $table->id();
            $table->string('nama_cetak');            // 1 MUKA 1/0, 1 MUKA 4/0, 2 MUKA 1/1, 2 MUKA 4/1, 2 MUKA 4/4
            $table->decimal('biaya', 12, 2);         // Biaya (A3)
            $table->integer('kode');                 // Kode (10, 40, 11, 41, 44)
            $table->enum('tipe', ['Fix', 'Variable'])->default('Fix');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('biaya_cetak_cover');
    }
};
