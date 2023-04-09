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
        Schema::create('berkas_pendaftaran', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pendaftaran_id')->references('id')->on('pendaftaran_ppdb')->onUpdate('cascade')->onDelete('cascade');
            $table->string('kartu_keluarga');
            $table->string('ktp');
            $table->string('akta_kelahiran');
            $table->string('print_nisn');
            $table->string('pas_foto');
            $table->string('ijazah');
            $table->string('skhun');
            $table->string('identitas_raport');
            $table->string('skbb');
            $table->string('kartu');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('berkas_pendaftaran');
    }
};
