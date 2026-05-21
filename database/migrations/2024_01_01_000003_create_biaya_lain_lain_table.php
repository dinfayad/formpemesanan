<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('biaya_lain_lain', function (Blueprint $table) {
            $table->id();
            $table->string('nama');                  // Potong, Shrink, Packing
            $table->decimal('biaya', 12, 2);         // Biaya
            $table->enum('tipe', ['Fix', 'Variable'])->default('Fix');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('biaya_lain_lain');
    }
};
