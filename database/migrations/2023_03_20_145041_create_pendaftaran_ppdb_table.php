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
        Schema::create('pendaftaran_ppdb', function (Blueprint $table) {
            $table->id();
            $table->foreignId('periode_id')->references('id')->on('periode')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('wali_murid_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->enum('status', ['tunggu', 'verifikasi'])->default('tunggu');
            $table->enum('status_tes', ['lulus', 'tidak-lulus'])->nullable();
            $table->string('tanggal_tes')->nullable();
            $table->string('waktu_tes')->nullable();
            $table->string('ruang_tes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pendaftaran_ppdb');
    }
};
