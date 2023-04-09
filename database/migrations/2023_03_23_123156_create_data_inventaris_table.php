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
        Schema::create('data_inventaris', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ruangan_id')->references('id')->on('data_ruangan')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('barang_id')->references('id')->on('data_barang')->onUpdate('cascade')->onDelete('cascade');
            $table->decimal('harga', 15, 2);
            $table->integer('jumlah');
            $table->integer('kondisi_baik')->nullable();
            $table->integer('kondisi_tidak_baik')->nullable();
            $table->integer('kondisi_rusak')->nullable();
            $table->string('keterangan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_inventaris');
    }
};
