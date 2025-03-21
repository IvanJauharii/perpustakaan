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
        Schema::create('ulasan', function (Blueprint $table) {
            $table->id();
            $table->softDeletes();
            $table->unsignedBigInteger('id_peminjam');
            $table->unsignedBigInteger('id_buku');
            $table->bigInteger('rating');
            $table->text('ulasan');
            if (Schema::hasTable('peminjam')){
            $table->foreign('id_peminjam')->references('id')->on('peminjam')->onDelete('cascade');
            }
            $table->foreign('id_buku')->references('id')->on('buku')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ulasan');
    }
};
