<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('jenis_laminating', function (Blueprint $table) {
            $table->id();
            $table->string('nama_laminating');       // Doft, Glossy, Non Laminating
            $table->decimal('biaya', 12, 2);         // Biaya
            $table->enum('tipe', ['Fix', 'Variable'])->default('Fix');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('jenis_laminating');
    }
};
