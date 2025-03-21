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
        Schema::create('new_peminjamans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_peminjam');
            $table->unsignedBigInteger('id_petugas')->nullable();
            $table->unsignedBigInteger('id_buku');
            $table->date('tanggal_peminjaman');
            $table->date('tanggal_pengembalian');
            $table->date('tanggal_dikembalikan')->nullable();
            $table->enum('status', ['dipinjam', 'dikembalikan'])->default('dipinjam');
            $table->softDeletes();
            $table->timestamps();

            // Relasi ke user dan buku
            $table->foreign('id_peminjam')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('id_petugas')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('id_buku')->references('id')->on('buku')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('new_peminjamans');
    }
};
