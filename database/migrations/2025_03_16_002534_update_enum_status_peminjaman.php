<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Ubah kolom ENUM status dari ['dipinjam', 'tersedia', 'kosong'] menjadi ['dipinjam', 'dikembalikan']
        DB::statement("ALTER TABLE peminjaman MODIFY COLUMN status ENUM('dipinjam', 'dikembalikan') NOT NULL");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Jika rollback, kembalikan ke ENUM sebelumnya
        DB::statement("ALTER TABLE peminjaman MODIFY COLUMN status ENUM('dipinjam', 'tersedia', 'kosong') NOT NULL");
    }
};
