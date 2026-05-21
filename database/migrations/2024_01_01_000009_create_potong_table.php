<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('potong', function (Blueprint $table) {
            $table->id();
            $table->string('variabel');              // Tinggi, Lebar
            $table->decimal('ukuran', 10, 4);        // Nilai ukuran (cm)
            $table->string('satuan')->default('cm'); // cm
            $table->decimal('biaya', 12, 2)->nullable(); // Biaya (5000)
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('potong');
    }
};
