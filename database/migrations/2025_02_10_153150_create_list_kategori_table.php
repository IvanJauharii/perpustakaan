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
        Schema::create('list_kategori', function (Blueprint $table) {
            $table->id();
            $table->softDeletes();
            $table->unsignedBigInteger('id_kategori');
            $table->unsignedBigInteger('id_buku');
            $table->foreign('id_kategori')->references('id')->on('kategori_buku')->onDelete('cascade');
            $table->foreign('id_buku')->references('id')->on('buku')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('list_kategori');
    }
};
