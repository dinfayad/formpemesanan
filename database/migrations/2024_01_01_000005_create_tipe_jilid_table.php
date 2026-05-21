<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tipe_jilid', function (Blueprint $table) {
            $table->id();
            $table->string('nama_jilid');            // Lem, Kawat, Spiral, Hardcover, Hardcover Spiral, TIDAK, Spot UV, Emboss, Poly
            $table->decimal('biaya_a3', 12, 2)->nullable();  // Biaya A3
            $table->enum('tipe', ['Fix', 'Variable'])->default('Fix');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tipe_jilid');
    }
};
