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
        Schema::create('riwayat_penyakit', function (Blueprint $table) {
            $table->id();
            $table->foreignId('anak_id')->references('id')->on('data_anak')->onUpdate('cascade')->onDelete('cascade');
            $table->string('nama_penyakit');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('riwayat_penyakit');
    }
};