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
        Schema::create('data_anak', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pendaftaran_id')->references('id')->on('pendaftaran_ppdb')->onUpdate('cascade')->onDelete('cascade');
            $table->string('nama');
            $table->string('hobi')->nullable();
            $table->string('panggilan');
            $table->string('agama');
            $table->integer('jumlah_saudara');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->string('asal_sekolah');
            $table->enum('status_keluarga', ['anak-kandung', 'anak-angkat']);
            $table->enum('jenis_kelamin', ['l', 'p']);
            $table->string('suku')->nullable();
            $table->integer('anak_ke');
            $table->string('alamat');
            $table->string('cita_cita')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_anak');
    }
};
