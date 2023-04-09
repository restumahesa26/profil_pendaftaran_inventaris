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
        Schema::create('guru_staf', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('bidang');
            $table->string('foto');
            $table->string('facebook')->nullable();
            $table->string('instagram')->nullable();
            $table->string('pendidikan_terakhir_tingkat')->nullable();
            $table->string('pendidikan_terakhir_jurusan')->nullable();
            $table->string('pendidikan_terakhir_tahun_lulus')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('guru_staf');
    }
};
