<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('harga_kertas', function (Blueprint $table) {
            $table->id();
            $table->string('nama_kertas');       // e.g. Art Carton 190 gram
            $table->decimal('biaya', 12, 2);     // Biaya per unit
            $table->decimal('atribut', 5, 2);    // Atribut (1 or 1.3)
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('harga_kertas');
    }
};
