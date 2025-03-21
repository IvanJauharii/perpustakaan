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
        Schema::table('notifikasi', function (Blueprint $table) {
            $table->date('tanggal_peminjaman')->nullable();
            $table->date('tanggal_pengembalian')->nullable();
            $table->integer('jumlah')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('notifikasi', function (Blueprint $table) {
            $table->dropColumn('tanggal_peminjaman');
            $table->dropColumn('tanggal_pengembalian');
            $table->dropColumn('jumlah');
        });
    }
};
