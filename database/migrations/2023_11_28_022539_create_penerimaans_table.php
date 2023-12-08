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
        Schema::create('penerimaans', function (Blueprint $table) {
            $table->id();
            $table->string('upt_id');
            $table->string('periode');
            $table->string('kode_rekening');
            $table->string('nama_rekening');
            $table->date('tgl_penerimaan');
            $table->date('tgl_penyetoran');
            $table->string('bukti_pembayaran');
            $table->string('jumlah');
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penerimaans');
    }
};
