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
        Schema::create('data', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pemkab');
            $table->string('nama_instansi');
            $table->string('alamat');
            $table->string('no_telp');
            $table->string('kode_pos');
            $table->string('fax');
            $table->string('website');
            $table->string('target_retribusi_tahun_ini');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data');
    }
};
