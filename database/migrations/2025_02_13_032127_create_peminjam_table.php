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
        Schema::create('peminjam', function (Blueprint $table) {
            $table->id();
            $table->softDeletes();
            $table->string('email');
            $table->unsignedBigInteger('id_user');
            $table->string('nama_lengkap');
            $table->string('location');
            $table->string('alamat');
            $table->string('phone');
            $table->string('poto');
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('peminjam');
    }
};
