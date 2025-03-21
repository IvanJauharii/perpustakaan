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
        Schema::table('koleksi_buku', function (Blueprint $table) {
            $table->dropForeign(['id_buku']); // hapus foreign key
            $table->dropColumn('id_buku');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('koleksi_buku', function (Blueprint $table) {
            $table->dropColumn('nama');
        });
    }
};
