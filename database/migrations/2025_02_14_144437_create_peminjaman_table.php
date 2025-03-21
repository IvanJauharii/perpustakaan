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
        Schema::create('peminjaman', function (Blueprint $table) {
            $table->id();
            $table->softDeletes();
            $table->unsignedBigInteger('id_petugas');
            $table->unsignedBigInteger('id_peminjam');
            $table->date('tanggal_peminjaman');
            $table->date('tanggal_pengembalian');
            $table->date('tanggal_dikembalikan');
            $table->enum('status', ['dipinjam', 'tersedia', 'kosong']);
            $table->foreign('id_petugas')->references('id')->on('petugas')->onDelete('cascade');
            $table->foreign('id_peminjam')->references('id')->on('peminjam')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('peminjaman');
    }
};
