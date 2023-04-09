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
        Schema::create('data_tambahan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pendaftaran_id')->references('id')->on('pendaftaran_ppdb')->onUpdate('cascade')->onDelete('cascade');
            $table->text('kebiasaan_anak');
            $table->text('pola_asuh');
            $table->text('pantangan');
            $table->text('karakter_anak');
            $table->text('alasan');
            $table->text('harapan_ortu');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_tambahan');
    }
};
