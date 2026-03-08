<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pesanans', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pemesan');
            $table->string('no_telepon');
            $table->text('alamat');
            $table->foreignId('produk_id')->constrained('produks')->onDelete('cascade');
            $table->integer('jumlah');
            $table->integer('total_harga');
            $table->enum('metode_pengambilan', ['ambil_sendiri', 'diantar'])->default('ambil_sendiri');
            $table->enum('metode_pembayaran', ['tunai', 'transfer'])->default('tunai');
            $table->integer('dp_dibayar')->default(0);
            $table->string('bukti_pembayaran')->nullable();
            $table->date('tanggal_ambil')->nullable();
            $table->enum('status', ['pending', 'diproses', 'selesai', 'dibatalkan'])->default('pending');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pesanans');
    }
};
