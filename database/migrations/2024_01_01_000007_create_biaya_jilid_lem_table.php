<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('biaya_jilid_lem', function (Blueprint $table) {
            $table->id();
            $table->string('bahan');                 // Lem, Mesin, SDM
            $table->decimal('biaya', 12, 2);         // Biaya
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('biaya_jilid_lem');
    }
};
