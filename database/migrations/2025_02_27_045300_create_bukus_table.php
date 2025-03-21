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
        Schema::create('bukus', function (Blueprint $table) {
            $table->id();
            $table->string('poto_buku');
            $table->string('judul');
            $table->foreignid('id_kategori')->constrained('kategori_buku')->onDelete('cascade');
            $table->string('penulis');
            $table->string('penerbit');
            $table->text('deskripsi');
            $table->string('kode_buku');
            $table->string('tahun_terbit');
            $table->integer('jumlah');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bukus');
    }
};
