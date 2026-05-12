<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
{
    Schema::create('bahan_bakus', function (Blueprint $table) {
        $table->id();

        $table->string('nama_bahan');
        $table->string('jenis');
        $table->string('ukuran')->nullable();
        $table->string('merk')->nullable();
        $table->string('supplier')->nullable();
        $table->date('update_terakhir');
        $table->integer('harga_beli')->nullable();
        $table->text('keterangan')->nullable();

        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bahan_bakus');
    }
};
