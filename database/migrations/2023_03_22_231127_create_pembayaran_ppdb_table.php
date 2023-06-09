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
        Schema::create('pembayaran_ppdb', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pendaftaran_id')->references('id')->on('pendaftaran_ppdb')->onUpdate('cascade')->onDelete('cascade');
            $table->string('bukti_pembayaran');
            $table->enum('status', ['terima','tolak','tunggu'])->default('tunggu');
            $table->string('keterangan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembayaran_ppdb');
    }
};
