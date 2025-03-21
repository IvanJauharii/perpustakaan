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
        Schema::create('petugas', function (Blueprint $table) {
            $table->id();
            $table->softDeletes();
            $table->unsignedBigInteger('id_user');
            $table->string('email');
            $table->string('nama_lengkap');
            $table->string('phone');
            $table->string('alamat');
            $table->string('poto');
            $table->enum('role', ['petugas', 'admin']);
            $table->timestamps();

            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('petugas');
    }
};
