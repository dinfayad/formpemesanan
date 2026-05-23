<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::table('tipe_jilid', function (Blueprint $table) {
        $table->string('tipe')->nullable()->change();
    });
}

public function down()
{
    Schema::table('tipe_jilid', function (Blueprint $table) {
        $table->string('tipe')->nullable(false)->change();
    });
}
};
