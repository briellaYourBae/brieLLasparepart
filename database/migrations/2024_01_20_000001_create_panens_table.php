<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('panens', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal_panen');
            $table->integer('jumlah_panen');
            $table->string('kualitas');
            $table->text('keterangan')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('panens');
    }
};
