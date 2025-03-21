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
        Schema::create('denda', function (Blueprint $table) {
            $table->id();
            $table->softDeletes();
            $table->unsignedBigInteger('id_peminjam');
            $table->bigInteger('nominal');
            $table->boolean('dibayar');
            $table->enum('status', ['lunas', 'belum']);
            if (Schema::hasTable('peminjam')){
            $table->foreign('id_peminjam')->references('id')->on('peminjam')->onDelete('cascade');
            }
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('denda');
    }
};
